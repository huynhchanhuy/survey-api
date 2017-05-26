<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Models\Collection;
use App\Api\V1\Transformers\CollectionTransformer;
use Dingo\Api\Http\Request;

class CollectionsController extends ApiController
{
	protected $type;
	private $perPage = 20;

	public function __construct() 
	{
		$this->type = 'collections';
	}

	public function index(Request $request) 
	{
		return $this->all($request);
	}

    public function all(Request $request)
    {
        $collections = Collection::paginate($this->perPage);

        return $this->response->paginator($collections, 
        	new CollectionTransformer, [ 'key' => $this->type]);
    }

    public function show(Request $request, $collection_id)
    {
    	// get the collection with the current id
    	$collection = Collection::find($id);

		// throw 404 exception if resource does not exists
	    // this will be converted to a jsonapi error by dingo
	    if ($collection === null) {
	        throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
	    }

        return $this->response->item($collection, 
        	new CollectionTransformer, [ 'key' => $this->type]);
    }
}
