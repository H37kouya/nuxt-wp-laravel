<?php

namespace App\Services;

use App\Facades\URL;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

// use function GuzzleHttp\json_decode;

class WPService
{
    private $_url;

    private $_api_url;

    private $_json_path;

    private $_url_list = [
        'category'   => '/wp/v2/categories',
        'frontPage'  => '/wuxt/v1/front-page',
        'menu'       => '/wuxt/v1/menu',
        'tag'        => '/wp/v2/tags',
        'slug'       => '/wuxt/v1/slug',
        'post'       => '/wp/v2/posts',
    ];

    private $_client;

    public function __construct()
    {
        $this->set_url();
        $this->set_api_url();
        $this->_json_path = '/wp-json';
        $this->_client = new Client([
            'base_uri' => $this->_url
        ]);
    }

    private function set_url(): void
    {
        $this->_url = URL::wp_url();
    }

    private function set_api_url(): void
    {
        $this->_api_url = URL::wp_api_url();
    }

    public function category(?int $id)
    {
        $path = $this->_json_path . $this->_url_list['category'];

        if (isset($id)) {
            $path .= '/' . $id;
        }

        $options = [
            'allow_redirects' => true,
        ];

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();
        return json_decode($responseBody, true);
    }

    public function category_slug(string $slug)
    {
        $path = $this->_json_path . $this->_url_list['category'];

        $options = [
            'allow_redirects' => true,
            'query'           => [
                'slug' => $slug
            ]
        ];

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();
        return json_decode($responseBody, true);
    }

    public function slug(string $post_or_page_slug, bool $embed = false)
    {
        $path = $this->_json_path . $this->_url_list['slug'] . '/' . $post_or_page_slug;

        $options = [
            'allow_redirects' => true,
            'verify' => false
        ];

        if ($embed) {
            $options['query'] = '_embed';
        }

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();
        return json_decode($responseBody, true);
    }

    public function tag(?int $id)
    {
        $path = $this->_json_path . $this->_url_list['tag'];

        if (isset($id)) {
            $path .= '/' . $id;
        }

        $options = [
            'allow_redirects' => true,
        ];

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();

        return json_decode($responseBody, true);
    }

    public function tag_slug(string $slug)
    {
        $path = $this->_json_path . $this->_url_list['tag'];

        $options = [
            'allow_redirects' => true,
            'query'           => [
                'slug' => $slug
            ]
        ];

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();

        return json_decode($responseBody, true);
    }

    public function post()
    {
        $path = $this->_json_path . $this->_url_list['post'];

        $options = [
            'allow_redirects' => true,
        ];

        $response = $this->_client->request('GET', $path, $options);

        // status code
        $statusCode = $response->getStatusCode();

        // response body
        $responseBody = $response->getBody();

        return json_decode($responseBody, true);
    }
}
