<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use GuzzleHttp\Client;

class FetchNewsCommand extends Command
{
    protected $signature = 'fetch:news';

    protected $description = 'Fetch news and save to the database';

    public function handle()
    {
        $client = new Client([
            'verify' => false,
        ]);

        try {
            // Guzzle ile News API'den veri çekme
            $response = $client->get('https://newsapi.org/v2/top-headlines', [
                'query' => [
                    'country' => 'us',
                    'apiKey' => '53825821c58e4e05a95934e7dea59ece',
                ],
            ]);

            // Guzzle'dan gelen veriyi JSON formatına çevirme
            $newsData = json_decode($response->getBody()->getContents(), true);

            foreach ($newsData['articles'] as $data) {
                // URL benzersiz olduğunu varsayalım, başka bir benzersiz özelliği kullanabilirsiniz
                $existingNews = News::where('url', $data['url'])->first();

                if (!$existingNews) {
                    // Veriyi modelinize uygun bir şekilde düzenleyin
                    $news = new News([
                        'author' => $data['author'],
                        'content' => $data['content'],
                        'description' => $data['description'],
                        'published_at' => $data['publishedAt'],
                        'source_name' => $data['source']['name'],
                        'title' => $data['title'],
                        'url' => $data['url'],
                        'url_to_image' => $data['urlToImage'],
                    ]);

                    $news->save(); // Modeli veritabanına kaydedin
                }
            }

            $this->info('News fetched and saved successfully.');
        } catch (\Exception $e) {
            $this->error('Error fetching news: ' . $e->getMessage());
        }
    }
}
