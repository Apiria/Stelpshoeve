<?php $title = "Fotos | De Stelpshoeve"; ?>
<?php include("includes/header.php"); ?>
<div class="content-header">
    <h1>Fotos</h1>
</div>
<div class="content">
    <div class="foto">
        <?php 
        
        $photos = glob( "images/photos/*.jpg"); 
        
        $photos_row = array_chunk( $photos, 2 );
        
        ?>
        <?php foreach ( $photos_row as $filenames ) : ?>
            <div class="foto-row">
                <?php foreach ($filenames as $filename) : ?>
                    <?php if ( file_exists( 'images/photos/thumbnails/' . basename( $filename ) ) ) : ?>
                        <a href="<?php echo siteUrl(); ?>/<?php echo $filename; ?>" rel="lightbox" title=""><img src="<?php echo siteUrl(); ?>/images/photos/thumbnails/<?php echo basename( $filename ); ?>"></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include("includes/footer.php"); ?>