<?php						
			function getRanking($NAME, $PROJECT){
			//			$NAME = "django";
			//			$PROJECT = "django";
						
//						echo "https://github.com/$NAME/$PROJECT";

                        error_reporting(E_ALL);
                        ini_set( 'display_errors','1');

                        //------------------------------¦scookie-----------------------------------------------------------------------------
                        $URL = "https://github.com/login";
						//$cookie_file = "tmp.cookie";
						$cookie_file = tempnam('./temp','cookie');
                        $ch = curl_init();
                        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.142 Safari/535.19';
                        curl_setopt($ch, CURLOPT_URL, $URL );
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT,         30);
						curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
						curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); //¦scookie

                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, True);
                        curl_setopt($ch, CURLOPT_CAPATH, "/certificate");
                        curl_setopt($ch, CURLOPT_CAINFO, "/certificate/server.crt");

                        $txt = curl_exec($ch);
                        curl_close($ch);

                     //var_dump($txt);
                      //  echo $txt;
						//var_dump($cookie_file);                       
                        preg_match_all('#<input name="authenticity_token" type="hidden" value=.[^>]*>#i', $txt, $authenticity_token);
                       
                        //var_dump($authenticity_token[0][0]);                   


						$authenticity_token_array=explode("\"",$authenticity_token[0][0]);						
						$authvalue = $authenticity_token_array[5];
						//var_dump($authvalue);
						
						
						




                       //------------------µn¤J°ʧ@, ±aµÛookie ©M ±b±K--------------------------------------------------------------------------------
                        $URL = "https://github.com/session";

                        $ch = curl_init();
                        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.142 Safari/535.19';
                        curl_setopt($ch, CURLOPT_URL, $URL );
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT,         30);
                        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
						curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
						curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); //¦scookie
											

                        $_POSTDATA["authenticity_token"]=$authvalue;
                        $_POSTDATA["login"]="wisecamera777@gmail.com";
                        $_POSTDATA["password"]="qazwsxedc123";
                        $_POSTDATA["commit"]="Sign in";

                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POSTDATA));

						
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, True);
                        curl_setopt($ch, CURLOPT_CAPATH, "/certificate");
                        curl_setopt($ch, CURLOPT_CAINFO, "/certificate/server.crt");

                        $txt = curl_exec($ch);
                        curl_close($ch);

						//var_dump($txt);
                        //echo $txt;


						
						/* 
							<a class="social-count js-social-count" href="/SnabbCo/snabbswitch/stargazers">458</a>
							<a class="social-count js-social-count" href="/SnabbCo/snabbswitch/watchers">63</a>
							<a href="/SnabbCo/snabbswitch/network" class="social-count">46</a>                     
						*/

						
						//------------------§ìstargazers  watchers  networks--------------------------------------------------------------------------------
					 	$URL = "https://github.com/$NAME/$PROJECT/";

                        $ch = curl_init();
                        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.142 Safari/535.19';
                        curl_setopt($ch, CURLOPT_URL, $URL );
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT,         30);
                        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
						curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
						curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); //¦scookie
						
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, True);
                        curl_setopt($ch, CURLOPT_CAPATH, "/certificate");
                        curl_setopt($ch, CURLOPT_CAINFO, "/certificate/server.crt");

                        $txt = curl_exec($ch);
                        curl_close($ch);

						$txt=str_replace(array("\r","\n","\t","\s"), ' ', $txt);
						
						//var_dump($txt); 

						
									
										
						preg_match('/<a[^>]*href="\/'.$NAME.'\/'.$PROJECT.'\/stargazers"[^>]*>(.*?) <\/a>/si', $txt, $stargazers); 			
						preg_match('/<a[^>]*href="\/'.$NAME.'\/'.$PROJECT.'\/watchers"[^>]*>(.*?) <\/a>/si', $txt, $watchers); 
						preg_match('#<a href="/'.$NAME.'\/'.$PROJECT.'/network" class="social-count">.[^>]*>#i', $txt, $network);  
			
			
		
			
						//¦L¥Xmatch  
						//var_dump($stargazers[0]);
						//var_dump($watchers[0]);
						//var_dump($network[0]);
						
						$stargazers_array=explode(" ",$stargazers[0]);
						$watchers_array=explode(" ",$watchers[0]);
						$tmp=explode(">",$network[0]);
						//var_dump($tmp);				
						
						$network_array=explode("<",$tmp[1]);
						
  
						echo "stargazers: ".$stargazers_array[12]."\n";
						echo "watchers: ".$watchers_array[12]."\n";
						echo "fork: ".$network_array[0]."\n";
					
		}
?>
                                                        
