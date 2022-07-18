<?php
class searchEngine{
	
	public function setEngine($str='google.com'){
		$allowed=array('google.com','google.ae');
		global $searchEngine;
		if(!(in_array($str,$allowed)))
		{
			throw new Exception('Search only Google.com or Google.ae');
		}
		else
		{
			$searchEngine=$str;
		}
	}
	
	public function getSearchEngine(){
		global $searchEngine;
		return $searchEngine;	
	}

	public function search($keywords){
		if(!is_array($keywords))
		{
			throw new Exception('Search Keywords must be an array!');
			
		}
		else
		{
			$query='';
			$len=count($keywords);
			$content='';
			$result=array();
			$searchEngine = $this->getSearchEngine();
			
			$arrItr = new ArrayIterator();
			
			foreach($keywords as $key=>$val)
			{
				$query .= $val."+";
			}	
			$query = substr($query, 0, -1);
			for ($x = 0; $x <= 5; $x++) {
				$pages = $x * 10;
				$result[]=$this->getResults($searchEngine,$pages,$query);
					
			}
				
			foreach($result as $k=>$v)
			{
				foreach($v as $k1=>$v1)
				{
					$arrItr->append($v1);
				}
			}
			return $arrItr;
		}
	}
	
	public function getResults($searchEngine,$pages,$searchString)
	{
		$content ='';
		$return=array();
      
		//generate the url
		$url = "https://www.".$searchEngine."/search?q=".$searchString."&start=".$pages."";
		$httpClient = new \simplehtmldom\HtmlWeb();
		$response = $httpClient->load($url);
		$rank=$pages;
		$keywords = str_replace('+', " ", $searchString);
		foreach($response->find('a[href^=/url?]') as $link)
		{

			$doc = new \DOMDocument;
			$doc->loadHTML($link->outertext);
			
			$titles = $doc->getElementsByTagName('h3');
            $rank++;
			$acc_links = strtok($link->plaintext,'&#8249;');
            $linkurl = strtok(str_replace("/url?q=","", $link->href),'&');
		   
			if (!$titles->count())
			{
				$isAD = 1;
				$title="";
				$description='';
			}
			else
			{
				$isAD = 0;
				$title = $titles->item(0)->nodeValue;
				$description=($link->parent () -> next_sibling() -> plaintext);
			}

			if(strpos($linkurl,'accounts.google') || strpos($linkurl,'support.google'))
			{
                  //ignore
            }
			else
			{
				$return[]=array('title'=>$title, 'url'=>$linkurl, 'rank'=>$rank, 'promoted'=>$isAD, 'keywords'=>$keywords, 'description'=>$description);                             
            }
		}
		return $return;
	}	
}

?>