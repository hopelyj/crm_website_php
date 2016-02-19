<?php
require_once './PDODB.class.php';	
class webinfo{
	
	private $config;
	private $_dao;

	public function __construct($config){
		$this->config = $config;
		$this->_dao = PDODB::getInstance($config['db']);

	}

	public function getInfo($id){
		$sql = "select * from dos_webinfo where Id=$id";
		$row = $this->_dao->getRow($sql);
		return $row;
	}

	public function getInfoList($index){
		$sql = "select * from dos_webinfo limit $index,20";
	    $_list = $this->_dao->getAll($sql);
	    return $_list;
	}
    
    public function getPagination($page){
        //total rows
        $total_pages = $this->getInfoCount();
        $targetpage = "./index.php";
        $limit = 20;
        $adjacents = 3;
        if ($page == 0) $page = 1;					//if no page var is given, default to 1.
        $prev = $page - 1;							//previous page is page - 1
        $next = $page + 1;							//next page is page + 1
        $lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;						//last page minus 1
        
        $pagination = "";
        if($lastpage > 1)
        {	
            $pagination .= "<div class=\"pagination\">";
            //previous button
            if ($page > 1) 
                $pagination.= "<a href=\"$targetpage?page=$prev\">上一页</a>";
            else
                $pagination.= "<span class=\"disabled\">上一页</span>";	
            
            //pages	
            if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
            {	
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
            {
                //close to beginning; only hide later pages
                if($page < 1 + ($adjacents * 2))		
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
                }
                //in middle; hide some front and some back
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
                }
                //close to end; only hide early pages
                else
                {
                    $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
                    }
                }
            }
            
            //next button
            if ($page < $counter - 1) 
                $pagination.= "<a href=\"$targetpage?page=$next\">next 下一页</a>";
            else
                $pagination.= "<span class=\"disabled\">next 下一页</span>";
            $pagination.= "</div>\n";
            return $pagination;
        }
    }
    
    public function getInfoCount(){
        $sql = "select count(*) from dos_webinfo";
        $count = $this->_dao->getOne($sql);
        return $count;
    }
}