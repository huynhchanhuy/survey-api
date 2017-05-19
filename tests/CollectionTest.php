<?php

class CollectionTest extends TestCase
{
    /**
     * @test
     */
    public function get_a_collection_by_name()
    {

        $response = $this->client->get('/collections/travel');

        $this->assertEquals(
            self::HTTP_OK,
            $response->getStatusCode()
        );

        $expected = [
            'id' => 'string',
            'type' => 'in:travel,news',
            'attributes' => [
                'page_id' => 'string',
                'position' => 'integer',
            ]
        ];

        $this->assertValidArray($expected, $this->getResponseArray($response)['data'][0]);

        // $this->markTestIncomplete('add expected return data.');
    }

    public function getResponseArray($response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}