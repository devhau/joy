<?php
class SEO
{
    private $data = [];
    private $nextline;
    private function __construct()
    {
        $this->data = [];
        $this->data['title'] = SEO_TITLE;
        $this->data['description'] = SEO_DESCRIPTION;
        $this->data['keyword'] = SEO_KEYWORD;
        $this->data['metas'] = [];
        $this->data['schemas'] = [];
        $this->addMetaTag('description',SEO_DESCRIPTION);
        $this->addMetaTag('keyword',SEO_KEYWORD);
    }
    //MINIFIED
    private function generateHtml($minified = false)
    {
        if ($minified) {
            $this->nextline = "";
        } else {
            $this->nextline = "<br/>";
        }
        echo "<title>" . $this->data['title'] . "</title>";
        foreach ($this->data['metas'] as $key => $value) {
            echo '<meta name="'.$key.'" content="'.$value.'">';
        }
    }
    private function setTitle($title)
    {
        $this->data['title'] = $title;
    }
    private function setDescription($value)
    {
        $this->data['description'] = $value;
    }
    private function addMetaTag($key, $value)
    {
        $this->data['metas'][$key] = $value;
    }
    private function setSchema($key, $value)
    {
        $this->data['schemas'][$key] = $value;
    }
    private static $self;
    private static function inst(): SEO
    {
        if (!isset(SEO::$self)) SEO::$self = new SEO();
        return SEO::$self;
    }
    public static function generate($minified = false)
    {
        SEO::inst()->generateHtml($minified);
    }
    public static function Title($value)
    {
        SEO::inst()->setTitle($value);
    }
    public static function Description($value)
    {
        SEO::inst()->setDescription($value);
    }
    public static function MetaTag($key, $value)
    {
        SEO::inst()->addMetaTag($key, $value);
    }
    public static function Schema($key, $value)
    {
        SEO::inst()->setSchema($key, $value);
    }
}
