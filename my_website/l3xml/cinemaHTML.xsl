<!-- current() permet de récupérer le noeud contexte -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1990/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<html>
			<head>
				<title>Cinema</title>
			</head>
			<body>
				<h1>Liste de films</h1>
				<ul>
					<xsl:apply-templates select="cinema/film"/>
				</ul>
			</body>
		</html>
	</xsl:template>
	
	<!-- Résultat "Alien (1979): science-fiction de Ridley Scott" -->
	<xsl:template match="cinema/film">
		<li>
			<b><xsl:value-of select="titre"/></b>
			<xsl:text> </xsl:text>
			(<xsl:value-of select="annee"/>):
			<xsl:text> </xsl:text>
			<xsl:value-of select="@type"/>
			<xsl:text> de </xsl:text>
			<xsl:value-of select="realisateur"/>
			<ol>
				<xsl:apply-template select="role"/>
			</ol>
		</li>
	</xsl:template>
	
	<!-- Résultat	"1.Ripley : SejoutmayWeaver"s -->
	<!-- 			"2...... : ......." -->
	<xsl:template match="role">
		<li>
			<i><xsl:value-of select="nom"/></i>
			<xsl:text> : </xsl:text>
			<xsl:value-of select="acteur"/>
		</li>
	</xsl:template>
</xsl:stylesheet>