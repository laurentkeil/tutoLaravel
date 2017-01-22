<?php

class TagTableSeeder extends Seeder {

    private function randDate()
	{
		return date("Y-m-d H:i:s", mt_rand(strtotime('Jan 01 2010'),strtotime('Dec 31 2013')));
	}

	public function run()
	{
		for($i = 0; $i < 20; ++$i)
		{
			$date = $this->randDate();
			DB::table('tags')->insert(array(
					'tag' => 'tag ' . $i,
					'tag_url' => 'tag-' . $i,
					'created_at' => $date,
          			'updated_at' => $date
				));
		}
	}
}