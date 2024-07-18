<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;
use Illuminate\Support\Facades\Redis;

class ScrapeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobId;

    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

    public function handle()
    {
        $job = Job::find($this->jobId);
        if (!$job) {
            return;
        }

        $client = new Client();
        $scrapedData = [];

        foreach (json_decode($job->urls) as $url) {
            $crawler = $client->request('GET', $url);
            $data = [];
            foreach (json_decode($job->selectors) as $selector) {
                $data[] = $crawler->filter($selector)->each(function ($node) {
                    return $node->text();
                });
            }
            $scrapedData[$url] = $data;
        }

        $job->scraped_data = json_encode($scrapedData);
        $job->status = 'completed';
        $job->save();

        // Example of setting a value in Redis
        Redis::set('job_'.$this->jobId.'_status', 'completed');
    }
}
