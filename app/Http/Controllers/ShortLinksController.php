<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ShortLinksController extends Controller
{
    //
    public function index()
    {

        $links = ShortLink::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $activeMenu = 'short-links';
        return view('dashboard.shortlinks.list', compact('activeMenu', 'links'));
    }
    public function create()
    {
        $activeMenu = 'short-links';
        return view('dashboard.shortlinks.create', compact('activeMenu'));
    }
    public function shorten(Request $request)
    {
        // dd($request->all());
        $url = $request->link;
        if ($request->service == 'is.gd') {
            $response = Http::get('https://is.gd/create.php', [
                'format' => 'simple',
                'url' => $url
            ]);

            if ($response->successful()) {
                return response()->json([
                    'shortened_url' => $response->body()
                ]);
            } else {
                return response()->json([
                    'error' => 'Failed to shorten URL'
                ], 500);
            }
        } else if ($request->service == 'linkr.it') {
            $response = Http::post('https://linkr.it/api/shorten', [
                'url' => $url
            ]);

            if ($response->successful()) {
                return response()->json([
                    'shortened_url' => $response->json()['short_url']
                ]);
            } else {
                \Log::error('Failed to shorten URL', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                return response()->json([
                    'error' => 'Failed to shorten URL'
                ], 500);
            }
        } else {
            $client = new Client();

            try {
                $response = $client->post('https://api.t.ly/api/v1/link/shorten', [
                    'headers' => [
                        'Authorization' => 'Bearer JtPwwrupZw75N5F1KriWNhSUsmlwtTwYvxmaPPr8yTSXiW0MqfcKdGi19VS9',
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'long_url' => $url,
                    ],
                ]);

                $body = $response->getBody();
                $result = json_decode($body, true);

                // Handle the shortened URL response
                $shortenedUrl = $result['short_url'];

                // return $shortenedUrl;
                return response()->json([
                    'shortened_url' => $shortenedUrl
                ]);
            } catch (\Exception $e) {
                // Handle exceptions
                return response()->json([
                    'error' => 'Failed to shorten URL',
                    'message' => $e->getMessage()
                ], 500);
            }
        }
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $link = new ShortLink;
        $link->user_id = auth()->user()->id;
        $link->link = $request->link;
        $link->service = $request->service_provider;
        $link->short_link = $request->short_link;
        $link->save();
        return redirect('/dashboard/short-links/index');
    }
    public function destroy(Request $request)
    {
        $del = ShortLink::find($request->link_id)->delete();
        return back();
    }
}
