<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	
		$this->assertCount(1, $crawler->filter('title:contains("Laravel PHP Framework")'));
		
		$crawler = $crawler->filter('title');
		$this->assertEquals($crawler->text(), 'Laravel PHP Framework');
	}

	public function testBasicExample1()
	{
	    $data = 'Je suis petit';
		$this->assertTrue(starts_with($data, 'Je'));
		$this->assertFalse(starts_with($data, 'Tu'));
		$this->assertSame(starts_with($data, 'Tu'), false);
		$this->assertStringStartsWith('Je', $data);
		$this->assertStringEndsWith('petit', $data);
	}

	public function testBasicExample2()
	{
	    $response = $this->call('GET', '/');
		$view = $response->original;
  		$this->assertEquals('Vous y êtes !', $view['message']);
		$this->assertViewHas('message', 'Vous y êtes !');
	}

}
