<!DOCTYPE html>
<html>
<head>
    <title>Medical Data</title>
</head>
<body>
    <h1>Medical Data for {{ $username }}</h1>

    <h2>X-ray</h2>
    <ul>
        @forelse ($xray as $item)
            <li>{{ $item }}</li>
        @empty
            <li>No X-ray data available.</li>
        @endforelse
    </ul>

    <h2>Ultrasound</h2>
    <ul>
        @forelse ($ultrasound as $item)
            <li>{{ $item }}</li>
        @empty
            <li>No Ultrasound data available.</li>
        @endforelse
    </ul>

    <h2>CT Scan</h2>
    <p>{{ $ct_scan }}</p>

    <h2>MRI</h2>
    <p>{{ $mri }}</p>

    <p>Thank you,</p>
    <p><em>E. King Immanuel</em></p>
</body>
</html>
