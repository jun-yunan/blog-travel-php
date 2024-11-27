function showNotification($message, $type = 'success')
{
    $colorClass = "";
    switch ($type) {
        case 'success':
            $colorClass = "alert-success";
            break;
        case 'error':
            $colorClass = "alert-danger";
            break;
        case 'warning':
            $colorClass = "alert-warning";
            break;
        default:
            $colorClass = "alert-info";
            break;
    }
    document.addEventListener('DOMContentLoaded', function () {
        var notification = document.createElement('div');
        notification.className = 'alert ' + $colorClass;
        notification.innerHTML = $message;
        document.body.appendChild(notification);

        setTimeout(function () {
            notification.style.opacity = '0';
            setTimeout(function () {
                document.body.removeChild(notification);
            }, 600);
        }, 5000);
    });
}