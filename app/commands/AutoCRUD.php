<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AutoCRUD extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'crud:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create CRUD MVC automatically from provided database table.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		if ($this->option('rollback') == 1)
		{
			File::delete(app_path().'/models/'.ucwords(str_singular($this->argument('table'))).'.php');
			File::delete(app_path().'/controllers/'.ucwords($this->argument('table')).'Controller.php');
			File::deleteDirectory(app_path().'/views/'.$this->argument('table'));
			$route = File::get(app_path().'/routes.php');
			$route = str_replace("Route::resource('".$this->argument('table')."', '".ucwords($this->argument('table'))."Controller"."');", '', $route);
			File::put(app_path().'/routes.php', $route);
			return;
		}

		$columns = DB::select('SELECT col.*, constraints.constraint_type, constraints.foreign_table_name, constraints.foreign_column_name
							   FROM information_schema.columns col
							   LEFT JOIN (SELECT
										    tc.constraint_name, tc.table_name, kcu.column_name, tc.constraint_type,
										    ccu.table_name AS foreign_table_name,
										    ccu.column_name AS foreign_column_name 
										FROM 
										    information_schema.table_constraints AS tc 
										    JOIN information_schema.key_column_usage AS kcu
										      ON tc.constraint_name = kcu.constraint_name
										    JOIN information_schema.constraint_column_usage AS ccu
										      ON ccu.constraint_name = tc.constraint_name
										WHERE constraint_type = \'FOREIGN KEY\' AND tc.table_name=\''.$this->argument('table').'\') constraints
										ON constraints.column_name = col.column_name
							   WHERE col.table_name=\''.$this->argument('table').'\' 
							   ORDER BY col.ordinal_position ASC');
		$exceptions = array('id', 'created_at', 'updated_at', 'deleted_at');


		// Create Ardent Model		
		$modelTemplate = File::get(app_path().'/models/TemplateArdentModel.php');
		$modelTemplate = str_replace('[ModelName]', ucwords(str_singular($this->argument('table'))), $modelTemplate);
		$rules = "";
		foreach ($columns as $column)
		{
			if ($column->is_nullable == 'NO' && !in_array($column->column_name, $exceptions))
			{
				$rules .= "'".$column->column_name."' => 'required',\n\t\t";
			}
		}
		$modelTemplate = str_replace('[rules]', $rules, $modelTemplate);
		File::put(app_path().'/models/'.ucwords(str_singular($this->argument('table'))).'.php', $modelTemplate);
		


		// Create RESTFUL Resource Controller		
		$controllerTemplate = File::get(app_path().'/controllers/TemplateCRUDController.php');
		$controllerTemplate = str_replace('[ControllerName]', ucwords($this->argument('table')).'Controller', $controllerTemplate);
		$controllerTemplate = str_replace('[Model]', ucwords(str_singular($this->argument('table'))), $controllerTemplate);
		$controllerTemplate = str_replace('[object]', $this->argument('table'), $controllerTemplate);
		File::put(app_path().'/controllers/'.ucwords($this->argument('table')).'Controller.php', $controllerTemplate);
		


		// Create the Views
		File::makeDirectory(app_path().'/views/'.$this->argument('table'), 0775);
		/* Index File */
		$indexTemplate = File::get(app_path().'/views/template/index.blade.php');
		$indexTemplate = str_replace('[Model]', ucwords(str_singular($this->argument('table'))), $indexTemplate);
		$indexTemplate = str_replace('[object]', $this->argument('table'), $indexTemplate);
		$tableHeader = "";
		$tableContent = "";
		foreach ($columns as $column)
		{
			if (!in_array($column->column_name, $exceptions))
			{
				$tableHeader .= "<th class=\"text-center\">".ucwords(str_replace('_', ' ', $column->column_name))."</th>\n\t\t\t\t\t\t\t";
				$tableContent .= "<td".($column->data_type == 'double precision' ? " class=\"text-right\"":"").">{{ ".($column->data_type == 'double precision' ? "number_format(\$object->".$column->column_name.")":"\$object->".$column->column_name)." }}</td>\n\t\t\t\t\t\t\t";
			}
		}
		$indexTemplate = str_replace('[TableHeader]', $tableHeader, $indexTemplate);
		$indexTemplate = str_replace('[TableContent]', $tableContent, $indexTemplate);
		File::put(app_path().'/views/'.$this->argument('table').'/index.blade.php', $indexTemplate);

		/* Create File */
		$createTemplate = File::get(app_path().'/views/template/create.blade.php');
		$createTemplate = str_replace('[Model]', ucwords(str_singular($this->argument('table'))), $createTemplate);
		$createTemplate = str_replace('[object]', $this->argument('table'), $createTemplate);
		$formContent = "";
		foreach ($columns as $column)
		{
			if (!in_array($column->column_name, $exceptions))
			{
				if ($column->constraint_type == 'FOREIGN KEY')
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::select('".$column->column_name."', ".ucwords(str_singular($column->foreign_table_name))."::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>\n\t\t\t\t";
				}
				else
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::text('".$column->column_name."', null, array('class' => 'form-control')) }}</div></div>\n\t\t\t\t";
				}
			}
		}
		$createTemplate = str_replace('[FormContent]', $formContent, $createTemplate);
		File::put(app_path().'/views/'.$this->argument('table').'/create.blade.php', $createTemplate);

		/* Edit File */
		$editTemplate = File::get(app_path().'/views/template/edit.blade.php');
		$editTemplate = str_replace('[Model]', ucwords(str_singular($this->argument('table'))), $editTemplate);
		$editTemplate = str_replace('[object]', $this->argument('table'), $editTemplate);
		$formContent = "";
		foreach ($columns as $column)
		{
			if (!in_array($column->column_name, $exceptions))
			{
				if ($column->constraint_type == 'FOREIGN KEY')
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::select('".$column->column_name."', ".ucwords(str_singular($column->foreign_table_name))."::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>\n\t\t\t\t";
				}
				else
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::text('".$column->column_name."', null, array('class' => 'form-control')) }}</div></div>\n\t\t\t\t";
				}
			}
		}
		$editTemplate = str_replace('[FormContent]', $formContent, $editTemplate);
		File::put(app_path().'/views/'.$this->argument('table').'/edit.blade.php', $editTemplate);

		/* Show File */
		$showTemplate = File::get(app_path().'/views/template/show.blade.php');
		$showTemplate = str_replace('[Model]', ucwords(str_singular($this->argument('table'))), $showTemplate);
		$showTemplate = str_replace('[object]', $this->argument('table'), $showTemplate);
		$formContent = "";
		foreach ($columns as $column)
		{
			if (!in_array($column->column_name, $exceptions))
			{
				if ($column->constraint_type == 'FOREIGN KEY')
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::select('".$column->column_name."', ".ucwords(str_singular($column->foreign_table_name))."::lists('name', 'id'), null, array('class' => 'form-control', 'readonly' => 'readonly')) }}</div></div>\n\t\t\t\t";
				}
				else
				{
					$formContent .= "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"".$column->column_name."\">".ucwords(str_replace('_', ' ', $column->column_name))."</label><div class=\"col-md-8\">{{ Form::text('".$column->column_name."', null, array('class' => 'form-control', 'readonly' => 'readonly')) }}</div></div>\n\t\t\t\t";
				}
			}
		}
		$showTemplate = str_replace('[FormContent]', $formContent, $showTemplate);
		File::put(app_path().'/views/'.$this->argument('table').'/show.blade.php', $showTemplate);


		// Append new RESTFUL Resource Route to /app/route.php
		File::append(app_path().'/routes.php', "\nRoute::resource('".$this->argument('table')."', '".ucwords($this->argument('table'))."Controller"."');");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('table', InputArgument::REQUIRED, 'The DB table from which to create CRUD MVC.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('rollback', null, InputOption::VALUE_NONE, 'Rollback a created CRUD based on provided table name.', null),
		);
	}

}
