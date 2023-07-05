<?php

abstract class SiteParser
{
    abstract public function getResource(): Resource;

    public function parse(): string
    {
        $resource = $this->getResource();
        $resource->connect();
        return $resource->getContent();
    }
}

class SomeSiteParser extends SiteParser
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getResource(): Resource
    {
        return new SomeSiteResource($this->url);
    }
}

interface Resource
{
    /**
     * Подключиться к сайту
     *
     * @return void
     */
    public function connect(): void;

    /**
     * Получить контентс с страницы сайта
     *
     * @return string
     */
    public function getContent(): string;
}

class SomeSiteResource implements Resource
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Подлючение к сайту
     *
     * @return void
     */
    public function connect(): void
    {
        // соединяемся (переходим) на сайт
        $url = $this->url;
    }

    /**
     * Получение необходимого контента
     *
     * @return string
     */
    public function getContent(): string
    {
        // получаем контент
        return 'content';
    }
}

// $url - ссылка на страницу SomeSite
$someSiteParser = new SomeSiteParser('example.com');
$content = $someSiteParser->parse();
echo $content;
