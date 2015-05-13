<?php
  include 'includes/config.php';
  $collection = $db->parameterdata_counters;
   $xml='<?xml version="1.0" encoding="UTF-8"?>
<response>
<statusCode>200</statusCode>
<statusText>Ok</statusText>
<data>
<testId>150506_7Z_6X4</testId>
<summary>http://www.webpagetest.org/result/150506_7Z_6X4/</summary>
<testUrl>http://www.timeinc.com/brands/food-wine/</testUrl>
<location>Dulles:Chrome:Chrome</location>
<from>Dulles, VA - Chrome - &lt;b&gt;Chrome&lt;/b&gt; - &lt;b&gt;Cable&lt;/b&gt;</from>
<connectivity>Cable</connectivity>
<bwDown>5000</bwDown>
<bwUp>1000</bwUp>
<latency>28</latency>
<plr>0</plr>
<completed>Wed, 06 May 2015 03:54:51 +0000</completed>
<tester>IE9201-192.168.102.91</tester>
<testerDNS>192.168.102.1,192.168.0.1</testerDNS>
<runs>1</runs>
<successfulFVRuns>1</successfulFVRuns>
<average>
<firstView>
<loadTime>7414</loadTime>
<TTFB>153</TTFB>
<bytesOut>33340</bytesOut>
<bytesOutDoc>22978</bytesOutDoc>
<bytesIn>4342583</bytesIn>
<bytesInDoc>4321272</bytesInDoc>
<connections>14</connections>
<requests>54</requests>
<requestsDoc>49</requestsDoc>
<responses_200>50</responses_200>
<responses_404>3</responses_404>
<responses_other>0</responses_other>
<result>99999</result>
<render>1893</render>
<fullyLoaded>9040</fullyLoaded>
<cached>0</cached>
<docTime>7414</docTime>
<domTime>0</domTime>
<score_cache>75</score_cache>
<score_cdn>95</score_cdn>
<score_gzip>100</score_gzip>
<score_cookies>-1</score_cookies>
<score_keep-alive>100</score_keep-alive>
<score_minify>-1</score_minify>
<score_combine>100</score_combine>
<score_compress>20</score_compress>
<score_etags>-1</score_etags>
<gzip_total>471170</gzip_total>
<gzip_savings>0</gzip_savings>
<minify_total>0</minify_total>
<minify_savings>0</minify_savings>
<image_total>3353886</image_total>
<image_savings>2660397</image_savings>
<optimization_checked>1</optimization_checked>
<aft>0</aft>
<domElements>924</domElements>
<pageSpeedVersion>2</pageSpeedVersion>
<titleTime>491</titleTime>
<loadEventStart>7400</loadEventStart>
<loadEventEnd>7410</loadEventEnd>
<domContentLoadedEventStart>2499</domContentLoadedEventStart>
<domContentLoadedEventEnd>2643</domContentLoadedEventEnd>
<lastVisualChange>8792</lastVisualChange>
<server_count>2</server_count>
<server_rtt>37</server_rtt>
<adult_site>0</adult_site>
<fixed_viewport>1</fixed_viewport>
<score_progressive_jpeg>3</score_progressive_jpeg>
<firstPaint>2084</firstPaint>
<docCPUms>5288</docCPUms>
<fullyLoadedCPUms>6630</fullyLoadedCPUms>
<docCPUpct>71</docCPUpct>
<fullyLoadedCPUpct>59</fullyLoadedCPUpct>
<isResponsive>-1</isResponsive>
<date>1430884417</date>
<SpeedIndex>3039</SpeedIndex>
<visualComplete>8792</visualComplete>
<run>1</run>
<effectiveBps>488644</effectiveBps>
<effectiveBpsDoc>595134</effectiveBpsDoc>
<avgRun>1</avgRun>
</firstView>
</average>
<standardDeviation>
<firstView>
<loadTime>0</loadTime>
<TTFB>0</TTFB>
<bytesOut>0</bytesOut>
<bytesOutDoc>0</bytesOutDoc>
<bytesIn>0</bytesIn>
<bytesInDoc>0</bytesInDoc>
<connections>0</connections>
<requests>0</requests>
<requestsDoc>0</requestsDoc>
<responses_200>0</responses_200>
<responses_404>0</responses_404>
<responses_other>0</responses_other>
<result>0</result>
<render>0</render>
<fullyLoaded>0</fullyLoaded>
<cached>0</cached>
<docTime>0</docTime>
<domTime>0</domTime>
<score_cache>0</score_cache>
<score_cdn>0</score_cdn>
<score_gzip>0</score_gzip>
<score_cookies>0</score_cookies>
<score_keep-alive>0</score_keep-alive>
<score_minify>0</score_minify>
<score_combine>0</score_combine>
<score_compress>0</score_compress>
<score_etags>0</score_etags>
<gzip_total>0</gzip_total>
<gzip_savings>0</gzip_savings>
<minify_total>0</minify_total>
<minify_savings>0</minify_savings>
<image_total>0</image_total>
<image_savings>0</image_savings>
<optimization_checked>0</optimization_checked>
<aft>0</aft>
<domElements>0</domElements>
<pageSpeedVersion>0</pageSpeedVersion>
<titleTime>0</titleTime>
<loadEventStart>0</loadEventStart>
<loadEventEnd>0</loadEventEnd>
<domContentLoadedEventStart>0</domContentLoadedEventStart>
<domContentLoadedEventEnd>0</domContentLoadedEventEnd>
<lastVisualChange>0</lastVisualChange>
<server_count>0</server_count>
<server_rtt>0</server_rtt>
<adult_site>0</adult_site>
<fixed_viewport>0</fixed_viewport>
<score_progressive_jpeg>0</score_progressive_jpeg>
<firstPaint>0</firstPaint>
<docCPUms>0</docCPUms>
<fullyLoadedCPUms>0</fullyLoadedCPUms>
<docCPUpct>0</docCPUpct>
<fullyLoadedCPUpct>0</fullyLoadedCPUpct>
<isResponsive>0</isResponsive>
<date>0</date>
<SpeedIndex>0</SpeedIndex>
<visualComplete>0</visualComplete>
<run>0</run>
<effectiveBps>0</effectiveBps>
<effectiveBpsDoc>0</effectiveBpsDoc>
<avgRun></avgRun>
</firstView>
</standardDeviation>
<median>
<firstView>
<run>1</run>
<tester>IE9201-192.168.102.91&lt;br&gt;</tester>
<URL>http://www.timeinc.com/brands/food-wine/</URL>
<loadTime>7414</loadTime>
<TTFB>153</TTFB>
<bytesOut>33340</bytesOut>
<bytesOutDoc>22978</bytesOutDoc>
<bytesIn>4342583</bytesIn>
<bytesInDoc>4321272</bytesInDoc>
<connections>14</connections>
<requests>54</requests>
<requestsDoc>49</requestsDoc>
<responses_200>50</responses_200>
<responses_404>3</responses_404>
<responses_other>0</responses_other>
<result>99999</result>
<render>1893</render>
<fullyLoaded>9040</fullyLoaded>
<cached>0</cached>
<docTime>7414</docTime>
<domTime>0</domTime>
<score_cache>75</score_cache>
<score_cdn>95</score_cdn>
<score_gzip>100</score_gzip>
<score_cookies>-1</score_cookies>
<score_keep-alive>100</score_keep-alive>
<score_minify>-1</score_minify>
<score_combine>100</score_combine>
<score_compress>20</score_compress>
<score_etags>-1</score_etags>
<gzip_total>471170</gzip_total>
<gzip_savings>0</gzip_savings>
<minify_total>0</minify_total>
<minify_savings>0</minify_savings>
<image_total>3353886</image_total>
<image_savings>2660397</image_savings>
<optimization_checked>1</optimization_checked>
<aft>0</aft>
<domElements>924</domElements>
<pageSpeedVersion>1.9</pageSpeedVersion>
<title>TimeInc.com Official Website|food &amp; wine</title>
<titleTime>491</titleTime>
<loadEventStart>7400</loadEventStart>
<loadEventEnd>7410</loadEventEnd>
<domContentLoadedEventStart>2499</domContentLoadedEventStart>
<domContentLoadedEventEnd>2643</domContentLoadedEventEnd>
<lastVisualChange>8792</lastVisualChange>
<browser_name>Google Chrome</browser_name>
<browser_version>42.0.2311.135</browser_version>
<server_count>2</server_count>
<server_rtt>37</server_rtt>
<base_page_cdn>Akamai</base_page_cdn>
<adult_site>0</adult_site>
<fixed_viewport>1</fixed_viewport>
<score_progressive_jpeg>3</score_progressive_jpeg>
<firstPaint>2084</firstPaint>
<docCPUms>5288.434</docCPUms>
<fullyLoadedCPUms>6630.042</fullyLoadedCPUms>
<docCPUpct>71</docCPUpct>
<fullyLoadedCPUpct>59</fullyLoadedCPUpct>
<isResponsive>-1</isResponsive>
<date>1430884417</date>
<SpeedIndex>3039</SpeedIndex>
<visualComplete>8792</visualComplete>
<run>1</run>
<effectiveBps>488644</effectiveBps>
<effectiveBpsDoc>595134</effectiveBpsDoc>
</firstView>
</median>
<run>
<id>1</id>
<firstView>
<tester>IE9201-192.168.102.91&lt;br&gt;</tester>
<results>
<URL>http://www.timeinc.com/brands/food-wine/</URL>
<loadTime>7414</loadTime>
<TTFB>153</TTFB>
<bytesOut>33340</bytesOut>
<bytesOutDoc>22978</bytesOutDoc>
<bytesIn>4342583</bytesIn>
<bytesInDoc>4321272</bytesInDoc>
<connections>14</connections>
<requests>54</requests>
<requestsDoc>49</requestsDoc>
<responses_200>50</responses_200>
<responses_404>3</responses_404>
<responses_other>0</responses_other>
<result>99999</result>
<render>1893</render>
<fullyLoaded>9040</fullyLoaded>
<cached>0</cached>
<docTime>7414</docTime>
<domTime>0</domTime>
<score_cache>75</score_cache>
<score_cdn>95</score_cdn>
<score_gzip>100</score_gzip>
<score_cookies>-1</score_cookies>
<score_keep-alive>100</score_keep-alive>
<score_minify>-1</score_minify>
<score_combine>100</score_combine>
<score_compress>20</score_compress>
<score_etags>-1</score_etags>
<gzip_total>471170</gzip_total>
<gzip_savings>0</gzip_savings>
<minify_total>0</minify_total>
<minify_savings>0</minify_savings>
<image_total>3353886</image_total>
<image_savings>2660397</image_savings>
<optimization_checked>1</optimization_checked>
<aft>0</aft>
<domElements>924</domElements>
<pageSpeedVersion>1.9</pageSpeedVersion>
<title>TimeInc.com Official Website|food &amp; wine</title>
<titleTime>491</titleTime>
<loadEventStart>7400</loadEventStart>
<loadEventEnd>7410</loadEventEnd>
<domContentLoadedEventStart>2499</domContentLoadedEventStart>
<domContentLoadedEventEnd>2643</domContentLoadedEventEnd>
<lastVisualChange>8792</lastVisualChange>
<browser_name>Google Chrome</browser_name>
<browser_version>42.0.2311.135</browser_version>
<server_count>2</server_count>
<server_rtt>37</server_rtt>
<base_page_cdn>Akamai</base_page_cdn>
<adult_site>0</adult_site>
<fixed_viewport>1</fixed_viewport>
<score_progressive_jpeg>3</score_progressive_jpeg>
<firstPaint>2084</firstPaint>
<docCPUms>5288.434</docCPUms>
<fullyLoadedCPUms>6630.042</fullyLoadedCPUms>
<docCPUpct>71</docCPUpct>
<fullyLoadedCPUpct>59</fullyLoadedCPUpct>
<isResponsive>-1</isResponsive>
<date>1430884417</date>
<SpeedIndex>3039</SpeedIndex>
<visualComplete>8792</visualComplete>
<run>1</run>
<effectiveBps>488644</effectiveBps>
<effectiveBpsDoc>595134</effectiveBpsDoc>
</results>
<pages>
<details>http://www.webpagetest.org/result/150506_7Z_6X4/1/details/</details>
<checklist>http://www.webpagetest.org/result/150506_7Z_6X4/1/performance_optimization/</checklist>
<breakdown>http://www.webpagetest.org/result/150506_7Z_6X4/1/breakdown/</breakdown>
<domains>http://www.webpagetest.org/result/150506_7Z_6X4/1/domains/</domains>
<screenShot>http://www.webpagetest.org/result/150506_7Z_6X4/1/screen_shot/</screenShot>
</pages>
<thumbnails>
<waterfall>http://www.webpagetest.org/result/150506_7Z_6X4/1_waterfall_thumb.png</waterfall>
<checklist>http://www.webpagetest.org/result/150506_7Z_6X4/1_optimization_thumb.png</checklist>
<screenShot>http://www.webpagetest.org/result/150506_7Z_6X4/1_screen_thumb.jpg</screenShot>
</thumbnails>
<images>
<waterfall>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_waterfall.png</waterfall>
<connectionView>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_connection.png</connectionView>
<checklist>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_optimization.png</checklist>
<screenShot>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;file=1_screen.jpg</screenShot>
</images>
<rawData><headers>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_report.txt</headers>
<pageData>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_IEWPG.txt</pageData>
<requestsData>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_IEWTR.txt</requestsData>
<utilization>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_progress.csv</utilization>
</rawData>
<videoFrames>
<frame>
<time>0</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>0</VisuallyComplete>
</frame>
<frame>
<time>1893</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>10</VisuallyComplete>
</frame>
<frame>
<time>2594</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>56</VisuallyComplete>
</frame>
<frame>
<time>3093</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>76</VisuallyComplete>
</frame>
<frame>
<time>3292</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>79</VisuallyComplete>
</frame>
<frame>
<time>3393</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>80</VisuallyComplete>
</frame>
<frame>
<time>3595</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>82</VisuallyComplete>
</frame>
<frame>
<time>3793</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>84</VisuallyComplete>
</frame>
<frame>
<time>3992</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>86</VisuallyComplete>
</frame>
<frame>
<time>4097</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>87</VisuallyComplete>
</frame>
<frame>
<time>4292</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>90</VisuallyComplete>
</frame>
<frame>
<time>4395</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>91</VisuallyComplete>
</frame>
<frame>
<time>4592</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>95</VisuallyComplete>
</frame>
<frame>
<time>4792</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>98</VisuallyComplete>
</frame>
<frame>
<time>4895</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>5092</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>7498</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>7605</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>7805</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>7992</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>8692</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>8792</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1&amp;file=</image>
<VisuallyComplete>100</VisuallyComplete>
</frame>
</videoFrames>
</firstView>
<repeatView>
<tester>IE9201-192.168.102.91&lt;br&gt;</tester>
<results>
<URL>http://www.timeinc.com/brands/food-wine/</URL>
<loadTime>2162</loadTime>
<TTFB>135</TTFB>
<bytesOut>14447</bytesOut>
<bytesOutDoc>5498</bytesOutDoc>
<bytesIn>150800</bytesIn>
<bytesInDoc>62952</bytesInDoc>
<connections>6</connections>
<requests>7</requests>
<requestsDoc>6</requestsDoc>
<responses_200>4</responses_200>
<responses_404>3</responses_404>
<responses_other>0</responses_other>
<result>404</result>
<render>704</render>
<fullyLoaded>3293</fullyLoaded>
<cached>1</cached>
<docTime>2162</docTime>
<domTime>0</domTime>
<score_cache>25</score_cache>
<score_cdn>33</score_cdn>
<score_gzip>-1</score_gzip>
<score_cookies>-1</score_cookies>
<score_keep-alive>100</score_keep-alive>
<score_minify>-1</score_minify>
<score_combine>100</score_combine>
<score_compress>-1</score_compress>
<score_etags>-1</score_etags>
<gzip_total>0</gzip_total>
<gzip_savings>0</gzip_savings>
<minify_total>0</minify_total>
<minify_savings>0</minify_savings>
<image_total>0</image_total>
<image_savings>0</image_savings>
<optimization_checked>1</optimization_checked>
<aft>0</aft>
<domElements>924</domElements>
<pageSpeedVersion>1.9</pageSpeedVersion>
<title>TimeInc.com Official Website|food &amp; wine</title>
<titleTime>291</titleTime>
<loadEventStart>2107</loadEventStart>
<loadEventEnd>2123</loadEventEnd>
<domContentLoadedEventStart>1285</domContentLoadedEventStart>
<domContentLoadedEventEnd>1357</domContentLoadedEventEnd>
<lastVisualChange>1593</lastVisualChange>
<browser_name>Google Chrome</browser_name>
<browser_version>42.0.2311.135</browser_version>
<server_count>2</server_count>
<server_rtt>41</server_rtt>
<base_page_cdn>Akamai</base_page_cdn>
<adult_site>0</adult_site>
<fixed_viewport>1</fixed_viewport>
<score_progressive_jpeg>-1</score_progressive_jpeg>
<firstPaint>914</firstPaint>
<docCPUms>1653.611</docCPUms>
<fullyLoadedCPUms>2480.416</fullyLoadedCPUms>
<docCPUpct>76</docCPUpct>
<fullyLoadedCPUpct>39</fullyLoadedCPUpct>
<isResponsive>-1</isResponsive>
<date>1430884438</date>
<SpeedIndex>1075</SpeedIndex>
<visualComplete>1593</visualComplete>
<run>1</run>
<effectiveBps>47751</effectiveBps>
<effectiveBpsDoc>31056</effectiveBpsDoc>
</results>
<pages>
<details>http://www.webpagetest.org/result/150506_7Z_6X4/1/details/cached/</details>
<checklist>http://www.webpagetest.org/result/150506_7Z_6X4/1/performance_optimization/cached/</checklist>
<report>http://www.webpagetest.org/result/150506_7Z_6X4/1/optimization_report/cached/</report>
<breakdown>http://www.webpagetest.org/result/150506_7Z_6X4/1/breakdown/</breakdown>
<domains>http://www.webpagetest.org/result/150506_7Z_6X4/1/domains/</domains>
<screenShot>http://www.webpagetest.org/result/150506_7Z_6X4/1/screen_shot/cached/</screenShot>
</pages>
<thumbnails>
<waterfall>http://www.webpagetest.org/result/150506_7Z_6X4/1_Cached_waterfall_thumb.png</waterfall>
<checklist>http://www.webpagetest.org/result/150506_7Z_6X4/1_Cached_optimization_thumb.png</checklist>
<screenShot>http://www.webpagetest.org/result/150506_7Z_6X4/1_Cached_screen_thumb.jpg</screenShot>
</thumbnails>
<images>
<waterfall>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_waterfall.png</waterfall>
<connectionView>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_connection.png</connectionView>
<checklist>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_optimization.png</checklist>
<screenShot>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;file=1_Cached_screen.jpg</screenShot>
</images>
<rawData>
<headers>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_report.txt</headers>
<pageData>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_IEWPG.txt</pageData>
<requestsData>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_IEWTR.txt</requestsData>
<utilization>http://www.webpagetest.org/results/15/05/06/7Z/6X4/1_Cached_progress.csv</utilization>
</rawData>
<videoFrames>
<frame>
<time>0</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>0</VisuallyComplete>
</frame>
<frame>
<time>704</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>10</VisuallyComplete>
</frame>
<frame>
<time>1094</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>1593</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>100</VisuallyComplete>
</frame>
<frame>
<time>1793</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>2297</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>2494</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>2602</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>2793</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>99</VisuallyComplete>
</frame>
<frame>
<time>3393</time>
<image>http://www.webpagetest.org/getfile.php?test=150506_7Z_6X4&amp;video=video_1_cached&amp;file=</image>
<VisuallyComplete>100</VisuallyComplete>
</frame>
</videoFrames>
</repeatView>
</run>
</data>
</response>';
   $user_collection = $db->parameterdata;
	$newXML = stripslashes($xml);
   $document = array( 
      "_id" => getNextSequence("parameterdataid"),
      "datasource_id" => 2,
	  "parameter_id" => 1,
	  "page_id" => 7,
	  "value" => '',
	  "data" => $newXML
   );
   $user_collection->insert($document);
   echo "Document inserted successfully <br>";
   
  
?>