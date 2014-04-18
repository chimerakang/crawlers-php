<?php
	//WiKi¼Ъº
	//½g¼Æ	//¦æ
	//§ó¸¼Æ	//URL :¡@https://github.com/SnabbCo/snabbswitch/wiki/Device-Driver-Programming/_history
	
			function fetchGitHubWikiUpdate($NAME,$PROJECT,$WIKINAME){
			
			/* $NAME = "SnabbCo";
			$PROJECT = "snabbswitch";
			$WIKINAME = "Device-Driver-Programming"; */
			
			
			error_reporting(E_ALL); 
			ini_set( 'display_errors','1');
	
			$URL = "https://github.com/$NAME/$PROJECT/wiki/$WIKINAME/_history";
			
	
			$ch = curl_init();
			$user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.142 Safari/535.19';
			curl_setopt($ch, CURLOPT_URL, $URL );				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
			curl_setopt($ch, CURLOPT_TIMEOUT,         30);			
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);		
							
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, True);
			curl_setopt($ch, CURLOPT_CAPATH, "/certificate");
			curl_setopt($ch, CURLOPT_CAINFO, "/certificate/server.crt");			
				
			$txt = curl_exec($ch);
			curl_close($ch);
				
			//var_dump($txt);			
			//echo $txt;
			
						
			preg_match_all('/<td[^>]*class="commit-name"[^>]*>(.*?) <\/td>/si', $txt, $updateTimes); 	
			//<td class="commit-name">
			
			echo "Name $WIKINAME update time:".sizeof($updateTimes[0])."\n";
		
			}
			function fetchGitHubWikiLineCount($NAME,$PROJECT,$WIKINAME){
				$commad = "python getWikiLine.py https://github.com/$NAME/$PROJECT/wiki/$WIKINAME";	
				$output = shell_exec($commad);				
				echo "name $WIKINAME NumOfLine:".$output."\n";
			}


	function getWiki($NAME, $PROJECT)	{		
			
			error_reporting(E_ALL); 
			ini_set( 'display_errors','1');
	
			//AME = "SnabbCo";
			//$PROJECT = "snabbswitch";			
	
	
			$URL = "https://github.com/$NAME/$PROJECT/wiki/_pages";
			
	
			$ch = curl_init();
			$user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.142 Safari/535.19';
			curl_setopt($ch, CURLOPT_URL, $URL );				
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
			curl_setopt($ch, CURLOPT_TIMEOUT,         30);			
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);		
							
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, True);
			curl_setopt($ch, CURLOPT_CAPATH, "/certificate");
			curl_setopt($ch, CURLOPT_CAINFO, "/certificate/server.crt");			
				
			$txt = curl_exec($ch);
			curl_close($ch);
				
			//var_dump($txt);			
			//echo $txt;
			
			
			//preg_match_all('#<strong><a href="/$NAME/$PROJECT/wiki/.[^>]*>#i', $txt, $authRandnumPic); 
			preg_match_all('#<strong><a href="/'.$NAME.'/'.$PROJECT.'/wiki/.[^>]*>#i', $txt, $authRandnumPic);
			//¦L¥Xmatch  
			//var_dump($authRandnumPic[0]);
			
			echo "page count:".sizeof($authRandnumPic[0])."\n";
			
			foreach($authRandnumPic[0] as $value){
				$_array=explode("/",$value);
				$wiki_page_name_array = explode("\"",$_array[4]);
				$wiki_page_name = $wiki_page_name_array[0];
				//var_dump($_array);
				//var_dump($wiki_page_name_array);
				//echo "¤峹¦WºÙ".$wiki_page_name."\n";
				fetchGitHubWikiUpdate($NAME,$PROJECT,$wiki_page_name);
				fetchGitHubWikiLineCount($NAME,$PROJECT,$wiki_page_name);
			}
				




				
			
			
			
			
		}
?>
