<!--          -->
<!--  ALERTA  -->
<!--          -->
<?php
if (isset($_SESSION['_alert_'])) {

    $type = $_SESSION['_alert_type'];
    $title = $_SESSION['_alert_title'];
    $text = $_SESSION['_alert_text'];

    echo "<script type='text/javascript'>
            Swal.fire({
                title: '$title',
                showClass: {
                    popup: 'animated fadeInDown faster'
                },
                hideClass: {
                    popup: 'animated fadeOutUp faster'
                },
                text: '$text',
                icon: '$type',
                footer: 'Esta información es importante.',
                backdrop: true,
                timer: 5000,
                timerProgressBar: true,
            })  
        </script>";

    unset($_SESSION['_alert_']);
    unset($_SESSION['_alert_type']);
    unset($_SESSION['_alert_title']);
    unset($_SESSION['_alert_text']);
}
?>