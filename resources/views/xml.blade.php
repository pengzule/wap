<!DOCTYPE html>
<html>
<head>
    <script src="/js/loadxmldoc.js">
    </script>
</head>
<body>

<script>
    xmlDoc=loadXMLDoc("note.xml");

    x=xmlDoc.getElementsByTagName("title");
    txt=x[0].childNodes[0].nodeValue;
    document.write(txt);
</script>
</body>
</html>