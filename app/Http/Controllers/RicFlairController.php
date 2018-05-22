<?php

namespace App\Http\Controllers;

use App\Counter;
use App\Events\JiraNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RicFlairController extends Controller
{
    public function update (Request $request, $api_token)
    {
        if ($api_token == config('services.jira.api_token')){

            // filter out JIRA notifications that are marking a task 'Done'

            $task_status_change = $request->input()['changelog']['items'][1]['toString'];

            if ($task_status_change == 'Done'){

                Log::info('JIRA task marked done.');

                // update counter

                $counter = Counter::where('id', 1)->first();

                if (!$counter){

                    $counter = Counter::create([
                        'id' => 1,
                        'count' => 1,
                    ]);

                } else {

                    $counter->count += 1;
                    $counter->save();
                }

                // pick a Ric Flair clip

                $url = $this->getRandomSoundClip();

                // broadcast the updated count and Ric Flair clip

                event(new JiraNotification($counter->count, $url));

                return response()->json(['yell' => 'WOOOOO!']);
            }

            return response()->json(['message' => 'complete this task for a woo.']);

        } else {

            \Illuminate\Support\Facades\Log::error('Invalid API token.');

            return response()->json(['message' => 'Invalid API token.'], 401);

        }
    }

    public function getRandomSoundClip()
    {
        $files = scandir(public_path('audio-files'));

        $selected_index = rand(2, (count($files) - 1));

        $selected_file = $files[$selected_index];

        $url = config('app.url') . '/audio-files/' . $selected_file;

        return $url;
    }
}
