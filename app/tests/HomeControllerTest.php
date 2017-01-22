<?php

use Mockery as m;
use Illuminate\Database\Eloquent\Collection as Collection;

class HomeControllerTest extends TestCase {

	public function testindex()
	{
		// Création de la collection
		$collection = new Collection;
		$i = 2;
		while($i--) {
			$collection->add((object) array('titre' => $i));
		}

		// Création Mock
		$mock = m::mock('Livre');
		$mock ->shouldReceive('all')
			  ->once()
			  ->andReturn($collection);

		// Création lien
		App::instance('Livre', $mock);

		// Action
		$crawler = $this->client->request('GET', action('HomeController@index'));

		// Assertion
		$this->assertCount(1, $crawler->filter('p:contains("Titre")'));
	}

   /* public function testshowWelcome()
	{
		$response = $this->action('GET', 'HomeController@showWelcome');
		$this->assertResponseOk();
	}*/
    /*public function testshowWelcome()
	{
		$messages = new stdClass();
		$messages->bonjour = 'Coucou ici !';
		$mock = m::mock('Messages');
		$mock ->shouldReceive('generaux')
			  ->once()
			  ->andReturn($messages);
		App::instance('Messages', $mock);
		$response = $this->action('GET', 'HomeController@showWelcome');
		$this->assertResponseOk();
		$this->assertViewHas('message', 'Coucou ici !');
	}*/

	public function tearDown()
	{
		m::close();	
	}

}