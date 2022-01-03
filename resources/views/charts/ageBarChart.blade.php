<div class="row col-12">
    <canvas id="barChart" style="width:100%;"></canvas>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
$colors = [];
for ($i = 0; $i < count($range['name']); $i++) {
    $colors[$i] = $i % 2 ? 'red' : 'green';
}
$ranges_text = $range['name'];
$counts = $range['count'];
?>

<script>
    var xValues = <?= json_encode($ranges_text) ?>;

    var yValues = <?= json_encode($counts) ?>;
    var barColors = <?= json_encode($colors) ?>;

    new Chart("barChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Age Ranges"
            }
        }
    });
</script>
@endpush