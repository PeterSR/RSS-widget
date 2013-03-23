<?php


class RSS {
    
    private $rss_url;     
    private $file;
    private $root;
    
    public function __construct($rss_url) {
        
        if (empty($rss_url) || !isset($rss_url))
            return false;
        
        $this->rss_url = $rss_url;
        $this->file = file_get_contents($rss_url);
        $this->root = new SimpleXMLElement($this->file);
    }
    
    /* -------------------- */
    
    public function rss_url()
    {
        return $this->rss_url;
    }
    
    public function file()
    {
        return $this->file;
    }
    
    public function root()
    {
        return $this->root;
    }
    
    /* ------------------- */
    
    public function title()
    {
        return $this->root->channel->title;
    }
    
    public function link()
    {
        return $this->root->channel->link;
    }
    
    public function description()
    {
        return $this->root->channel->description;
    }
    
    public function items($count = null)
    {
        $item_array = $this->root->channel->item;
        $items = array();
        
        if ($count == null || $count > count($item_array))
        {
            $count = count($item_array);
        }
        
        for ($i = 0; $i < $count; $i++)
        {
            $e = $item_array[$i];
            $items[$i] = new RSS_news($e->title, $e->link, $e->description, $e->pubDate);
        }
        
        return $items;
    }
    
}


class RSS_news {
    public $title;
    public $link;
    public $desc;
    public $date;
    
    private $date_format = "d-m-Y H:i";
    
    public function __construct($title, $link, $desc, $date) {
        $this->title = $title;
        $this->link = $link;
        $this->desc = $desc;
        $this->date = date($this->date_format, strtotime($date));
    }
}


?>
