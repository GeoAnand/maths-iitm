<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('UserPrivilegesTableSeeder');
		$this->call('StaticContentTableSeeder');
		$this->call('ContactTableSeeder');
		$this->call('OthercoursesTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {
	public function run()
	{
		DB::table('users')->truncate();

        User::create(
        	array(
        		'username'			=> 	'superadmin', 
        		'user_fname'		=>	'superadmin', 
        		'user_email'		=>	'alok@desto.co.in', 
        		'password'			=>	Hash::make('admin'),
        		'user_active'		=>	1,
        		'user_office'		=> 'IIT Research Park',
        		'user_designation'	=>	'Software Developer',
        		'user_namehandle'	=>	'superadmin',
        		'isadmin'			=>	1,
        		'issuper'			=>	1,
        		'user_subtype'		=>	'default'
        	)
        );
	}
}

class UserPrivilegesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('user_privileges')->truncate();

        Userprivileg::create(
        	array(
        		'user_id'			=> 	User::where('username', '=', 'superadmin')->pluck('id'),
        		'people'			=>	1, 
        		'student'			=>	1, 
        		'research'			=>	1, 
        		'programs'			=>	1,
        		'events'			=>	1, 
        		'resources'			=>	1, 
        		'newannouncement'	=>	1, 
        		'createadmin'		=>	1,
        		'bookings'			=>	1
        	)
        );
	}
}

class StaticContentTableSeeder extends Seeder {
	public function run()
	{
		DB::table('static_content')->truncate();

		Staticcontent::create(
			array(
				'whichlocation'		=>	'home',
				'content'			=>	'No content updated',
				'doneby'			=>	User::where('username', '=', 'superadmin')->pluck('id')
			)
		);

		Staticcontent::create(
			array(
				'whichlocation'		=>	'videos',
				'content'			=>	'No content updated',
				'doneby'			=>	User::where('username', '=', 'superadmin')->pluck('id')
			)
		);
	}
}

class ContactTableSeeder extends Seeder {
	public function run()
	{
		DB::table('contact')->truncate();

		Contact::create(
			array(
				'contact_for'			=>	'To be updated',
				'contact_details'		=>	'To be updated',
				'contact_email'			=>	'To be updated',
				'contact_office_email'	=>	'To be updated',
				'contact_updated_by'	=>	'To be updated'
			)
		);
	}
}

class OthercoursesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('othercourses')->truncate();

		Othercourses::create(
			array(
				'details'			=>	'To be updated',
				'updated_by'		=>	User::where('username', '=', 'superadmin')->pluck('id')
			)
		);
	}
}
