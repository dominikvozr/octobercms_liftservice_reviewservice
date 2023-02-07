<?php namespace Dondo\ReviewService\Handlers;

use Backend\Controllers\Auth;
use Dondo\ReviewService\Models\Review;
use Dondo\ReviewService\Models\Service;
use Dondo\SystemManagement\Facades\ProductManager;
use Event;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewServiceHandler extends Controller
{
	public function storeReview(Request $request)
	{
		$review = Review::create([
			'product_id' => $request->input('productId'),
			'time' => $this->formatTime($request->input('time')),
			'date' => $this->formatDate($request->input('date')),
			'message' => $request->input('message'),
			]);
		Event::fire('review.created', ['review' => $review, 'user' => Auth::getUser()]);
		return response()->json(['review' => $review]);
	}

	public function storeService(Request $request)
	{
		$service = Service::create([
			'product_id' => $request->input('productId'),
			'time' => $this->formatTime($request->input('time')),
			'date' => $this->formatDate($request->input('date')),
			'service' => $request->input('service'),
		]);
		Event::fire('service.created', ['service' => $service, 'user' => Auth::getUser()]);
		return response()->json(['service' => $service]);
	}

	private function formatDate($date)
	{
		$newDate = explode('/', $date);
		return $newDate[2] . '-' . $newDate[1] . '-' . $newDate[0];
	}

	private function formatTime($time)
	{
		$newTime = explode(':', $time);
		return strlen($newTime[0]) > 1 ? $time : '0' + $time;
	}

	/* public function deleteProduct($id)
	{
		//if (!Auth::check()) return response(status: 403);

		$product = ProductManager::deleteProduct($id);

		return response()->json(['message' => 'success', 'product' => $product]);
	} */
}
