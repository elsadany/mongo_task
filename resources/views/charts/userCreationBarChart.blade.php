<div class="row col-12">
    <canvas id="datesbarChart" style="width:100%;"></canvas>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
$colors = [];
for ($i = 0; $i < count($dates); $i++) {
    $colors[$i] = $i % 2 ? 'red' : 'green';
}
$dates_text = array_column($dates, 'create_date');
$counts =  array_column($dates, 'count');

?>

<script>
    var xValues = <?= json_encode($dates_text) ?>;

    var yValues = <?= json_encode($counts) ?>;
    var barColors = <?= json_encode($colors) ?>;

    new Chart("datesbarChart", {
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
                text: "Creation Dates"
            }
        }
    });
</script>
@endpush