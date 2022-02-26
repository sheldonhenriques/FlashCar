<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body bgcolor="#8470ff">
<center><h3><u>CARS</u></h3></center>
<table border="1" align="center" cellspacing="5" cellpadding="30">
<tr bgcolor="gold">
<th>Time</th>
<th>Sunny</th>
<th>Xcent</th>
<th>Verna</th>
</tr>
<xsl:for-each select="Cars/Car-Details">
<xsl:if test="sunny &gt; 200">
<tr bgcolor="red">
<td><xsl:value-of select="time"/></td>
<td><xsl:value-of select="sunny"/></td>
<td><xsl:value-of select="xcent"/></td>
<td><xsl:value-of select="verna"/></td>
</tr>
</xsl:if>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>