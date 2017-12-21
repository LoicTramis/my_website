<xsl:stylesheet xmlns:xsl="http://www.w3.org/1990/XSL/Transform">
	<xsl:output method="xml"/>
	
	<!-- (priorité = -0.5) -->
	<xsl:template match="@* | node()">
		<xsl:copy>
			<xsl:apply-templates select="@*|node()"/>
		</xsl:copy>
	</xsl:template>
	
	<!-- Cette règle est prioritaire sur la 1ere (priorité = 0) -->
	<xsl:template match="producteur"/>
	
	<xsl:template match="cinema/film">
		<xsl:copy>
			<!-- copie tout ce qui exite déjà dans film -->
			<xsl:apply-templates select="@*|node()"/>
			<xsl:apply-templates select="/cinema/producteur[film/@ref = current()/@id]/nom"/>
		</xsl:copy>
	</xsl:template>
	
	<xsl:template match="producteur/nom">
		<producteur>
			<xsl:value-of select="."/>
		</producteur>
	</xsl:template>
</xsl:stylesheet>