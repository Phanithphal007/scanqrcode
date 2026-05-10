<?php

namespace App\Http\Controllers;

use App\Models\TetsQr;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;

class TetsQrController extends Controller
{
    public function generate()
{
    $tetsqr = TetsQr::create([
        'name'    => 'John Doe',
        'email'   => 'john@example.com',
        'phone'   => '08123456789',
        'purpose' => 'Meeting',
    ]);

    // Much simpler on hosting
    $url = route('form', $tetsqr->id, true);   // This is enough

    // Good settings for QR Code
    $qrCode = new QrCode(
        $url,
        new Encoding('UTF-8'),
        ErrorCorrectionLevel::High,   // Important
        600,                          // Big size
        10,
        RoundBlockSizeMode::Margin
    );

    $writer = new SvgWriter();
    $result = $writer->write($qrCode);
    $qrBase64 = base64_encode($result->getString());

    return view('qr.generate', compact('qrBase64', 'url'));
}

    /**
     * Build URL that works on mobile devices (especially same WiFi)
     */
    private function buildQrUrl(Request $request, int $id): string
    {
        // For local development (Laptop + iPhone on same WiFi)
        if (in_array($request->getHost(), ['localhost', '127.0.0.1'], true)) {
            $localIp = $this->getLocalNetworkIp();
            if ($localIp) {
                return "http://{$localIp}/form/{$id}";
            }
        }

        // Production or when APP_URL is configured properly
        return route('form', $id, true);
    }

    /**
     * Get local network IP address
     */
    private function getLocalNetworkIp(): ?string
    {
        $addresses = gethostbynamel(gethostname()) ?: [];

        foreach ($addresses as $address) {
            if (!filter_var($address, FILTER_VALIDATE_IP)) {
                continue;
            }

            if (str_starts_with($address, '127.') || str_starts_with($address, '169.254.')) {
                continue;
            }

            return $address;
        }

        return null;
    }

    public function showForm($id)
    {
        $tetsqr = TetsQr::findOrFail($id);
        return view('qr.form', compact('tetsqr'));
    }

    public function submit(Request $request, $id)
    {
        $tetsqr = TetsQr::findOrFail($id);

        $tetsqr->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('success');
    }

    public function success()
    {
        return view('qr.success');
    }
}
