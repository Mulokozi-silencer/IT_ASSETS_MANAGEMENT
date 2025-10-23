@extends('layouts.app')


@section('title','Dashboard')
@section('page-title','Dashboard')


@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-white p-4 rounded shadow">
<div class="text-sm text-gray-500">Total Assets</div>
<div class="text-2xl font-bold">{{ $totalAssets ?? 0 }}</div>
</div>
<div class="bg-white p-4 rounded shadow">
<div class="text-sm text-gray-500">Under Maintenance</div>
<div class="text-2xl font-bold">{{ $underMaintenance ?? 0 }}</div>
</div>
<div class="bg-white p-4 rounded shadow">
<div class="text-sm text-gray-500">Expiring Warranty</div>
<div class="text-2xl font-bold">{{ $expiringWarranty ?? 0 }}</div>
</div>
</div>


<div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
<div class="bg-white p-4 rounded shadow">
<h3 class="font-semibold mb-3">Assets by Department</h3>
<canvas id="assetsByDept"></canvas>
</div>
<div class="bg-white p-4 rounded shadow">
<h3 class="font-semibold mb-3">Maintenance Cost (Last 6 months)</h3>
<canvas id="maintenanceCost"></canvas>
</div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function(){
// placeholder charts - replace with real data via blade or API
const ctx = document.getElementById('assetsByDept');
if(ctx){
new Chart(ctx.getContext('2d'), { type: 'pie', data: { labels: ['ICT','HR','Finance'], datasets: [{ data: [10,5,8] }] } });
}
const ctx2 = document.getElementById('maintenanceCost');
if(ctx2){
new Chart(ctx2.getContext('2d'), { type: 'line', data: { labels: ['Apr','May','Jun','Jul','Aug','Sep'], datasets: [{ label: 'Cost', data: [200,400,150,300,250,500], fill:false }] } });
}
});
</script>
@endsection