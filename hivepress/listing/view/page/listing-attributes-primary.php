<?php
return;
// ARCHIVO: listing-attributes-primary.php
defined( 'ABSPATH' ) || exit;

$listing = $context['listing'];

if ( ! $listing ) {
	return;
}

// Obtenemos TODOS los atributos
$attributes = $listing->get_attributes();

// Obtenemos las definiciones para saber a qué área pertenecen
$scoped_attributes = hivepress()->attribute->get_attributes( [ 'scope' => 'listing' ] );

if ( ! $attributes ) {
	return;
}
?>

<div class="hivepress-attributes-primary-custom">
	
    <div class="mis-atributos-grid">
      <h1>hola</h1>
        
        <?php foreach ( $attributes as $name => $value ) : ?>
            <?php
            // 1. Buscamos la definición de este atributo
            if ( ! isset( $scoped_attributes[ $name ] ) ) {
                continue;
            }

            $attribute_def = $scoped_attributes[ $name ];
            $areas         = $attribute_def->get_arg( 'display_areas' );

            // 2. FILTRO CLAVE: Solo mostramos si está asignado a 'view_page_primary'
            // Si estuvieras editando el secundario, usarías 'view_page_secondary'
            if ( ! is_array( $areas ) || ! in_array( 'view_page_primary', $areas ) ) {
                continue;
            }
            ?>

            <div class="mi-item-atributo" data-slug="<?php echo esc_attr( $name ); ?>">
                <span class="mi-label">
                    <?php echo esc_html( $attribute_def->get_label() ); ?>:
                </span>
                <span class="mi-valor">
                    <?php echo $value; // Esto imprime el valor formateado (ej: icono + texto) ?>
                </span>
            </div>

        <?php endforeach; ?>
        
    </div>
</div>