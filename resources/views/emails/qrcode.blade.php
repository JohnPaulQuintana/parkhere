<x-mail::message>
# Parking Gatepass QR Code

Attached is the QR code generated for you.

Dear {{ $qrCodeData->data['name'] }},

Attached is your QR code gatepass for accessing the parking area.

# Reservation Detail's

Establishment : {{ $qrCodeData->data['establishment'] }}

Parking Slot : {{ $qrCodeData->data['parking_slot'] }}

Parking Price(hrs) : {{ $qrCodeData->data['price'] }}

Date of Booked : {{ $qrCodeData->data['date'] }}

Starting Time : {{ $qrCodeData->data['starting_time'] }}

End Time : {{ $qrCodeData->data['end_time'] }}

# Vehicle Information

Type : {{ $qrCodeData->data['vehicle_type'] }}

Color : {{ $qrCodeData->data['vehicle_color'] }}

Plate Number : {{ $qrCodeData->data['plate_number'] }}

# qrcode availability

Expiration Date : {{ $qrCodeData->data['date'] }}

Please present this QR code when entering and exiting the parking facility.

Thank you for using our services.

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
