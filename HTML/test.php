<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.parseXML demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p id="someElement"></p>
<p id="anotherElement"></p>
 
<script>
var xml = "<?xml version='1.0' encoding='UTF-8'?>
<response>
<statusCode>200</statusCode>
<statusText>Ok</statusText>
<data>
<testId>150512_NR_6RQ</testId>
<ownerKey>2197df374158f398b1b08cfaa14e81eb2f8e7a2d</ownerKey>
<xmlUrl>http://www.webpagetest.org/xmlResult/150512_NR_6RQ/</xmlUrl>
<userUrl>http://www.webpagetest.org/result/150512_NR_6RQ/</userUrl>
<summaryCSV>http://www.webpagetest.org/result/150512_NR_6RQ/page_data.csv</summaryCSV>
<detailCSV>http://www.webpagetest.org/result/150512_NR_6RQ/requests.csv</detailCSV>
<jsonUrl>http://www.webpagetest.org/jsonResult.php?test=150512_NR_6RQ</jsonUrl>
</data>
</response>";
$(xml).find('testId').each{
  alert( $(this).text());
 }
</script>
 
</body>
</html>