    <?php
    require_once __DIR__ . '/dompdf/autoload.inc.php';

    //reference the Dompdf namespace
    // Dompdf\Autoloader::register();
    use Dompdf\Dompdf;
    use Dompdf\Options;

    $options = new Options();
    $options->set('defaultFont', 'Courier');

    // instantiate and use the dompdf class
    $dompdf =  new Dompdf($options);

    ?>