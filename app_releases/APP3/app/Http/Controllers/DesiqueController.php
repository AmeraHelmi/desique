<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Snew;
use App\Models\Service;
use App\Models\Member;
use App\Models\Post;
use App\Models\Product;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Carbon\Carbon;


class DesiqueController extends Controller {

	public function __construct()
	 {
	 }

	public function index(Request $request)
	{
		$new=New Snew;
		$snews=$new->select(array('id','title','additional_info'))->get();
		$service=New Service;
		$services=$service->select(array('name','flag','description','url'))->get();
		$product=New Product;
		$products=$product->select(array('name','flag','description','url','price'))->get();
		$member=New Member;
		$members=$member->select(array('name','flag','job','email','facebook'))->get();
		$post=New Post;
		$posts=$post->select(array('title','body','flag'))->get();
		return view('desique.index')
						->with('services',$services)
						->with('products',$products)
						->with('members',$members)
						->with('posts',$posts)
						->with('news',$snews);
	}
public function desique(Request $request)
{
	$new=New Snew;
	$snews=$new->select(array('id','title','additional_info'))->get();
	$service=New Service;
	$services=$service->select(array('name','flag','description','url'))->get();
	$product=New Product;
	$products=$product->select(array('name','flag','description','url','price'))->get();
	$member=New Member;
	$members=$member->select(array('name','flag','job','email','facebook'))->get();
	$post=New Post;
	$posts=$post->select(array('title','body','flag'))->get();
	return view('desique.en_index')
					->with('services',$services)
					->with('products',$products)
					->with('members',$members)
					->with('posts',$posts)
					->with('news',$snews);}
	//postdetails
	public function post_details($id)
	{
		$post = new Post();
		$p_detail = $post
		             ->join('categories as c','c.id','=','posts.cat_id')
		             ->select(array('posts.id as id',
		             	            'c.name as Cname',
		             	            'posts.title as title',
		             	            'posts.flag as flag',
		             	            'posts.body as body',
		             	            'posts.date as date',
		             	            'posts.author as author'))
		             ->where('posts.id',$id)->get();

		$previous_post_id = $post->where('id','<',$id)->first();
		$next_post_id     = $post->where('id','>',$id)->first();

		$num_comments = Pcomment::where('post_id',$id)->count();
		return view ('Front.post-details')
		->with('p_details',$p_detail)
		->with('previous_post_id',$previous_post_id)
		->with('next_post_id',$next_post_id)
		->with('num_comments',$num_comments);
	}

//vedio_detail
	public function vedio_details($id)
	{
		$vedio = new V_album();
		$v_detail = $vedio
								 ->join('categories as c','c.id','=','v_albums.category_id')
								 ->select(array('v_albums.id as id',
															'c.name as Cname',
															'v_albums.title as title',
															'v_albums.flag as flag',
															'v_albums.description as description',
															'v_albums.created_at as date'))
								 ->where('v_albums.id',$id)->get();

		$previous_vedio_id = $vedio->where('id','<',$id)->first();
		$next_vedio_id     = $vedio->where('id','>',$id)->first();

		return view ('Front.video-details')
		->with('v_details',$v_detail)
		->with('previous_vedio_id',$previous_vedio_id)
		->with('next_vedio_id',$next_vedio_id);
	}

}
