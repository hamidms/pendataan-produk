<!-- resources/views/sales/submit.blade.php -->
<h1>Submit Penjualan</h1>

<form method="POST" action="{{ route('sales.submit') }}">
    @csrf
    <button type="submit">Submit</button>
</form>
