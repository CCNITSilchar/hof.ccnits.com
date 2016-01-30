<?php
$arr = array();
$id = $_GET['id']; 
$data = array();
$r = "SELECT contest.date,contest.name,contest_user_rating.rating FROM contest INNER JOIN contest_user_rating ON contest.id=contest_user_rating.cid WHERE contest_user_rating.uid = $id";
$q = mysqli_query($dbc,$r);
$i = 1;
while($row = mysqli_fetch_assoc($q)){
	$data[]=array('x'=> $i,'y'=>(int)$row['rating'],'event'=>$row['name']);
	$i++;
	}
?>

<script>

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
		xAxis: {
            lineWidth:0,
			lineColor:'transparent',
			labels:{
				enabled: false
			}
        },
        yAxis: {
            title: {
                text: ''
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ //Newbie
                from: 0,
                to: 1200,
                color: 'rgba(128,128,128, 0.4)',
                
            }, { // Pupil
                from: 1200,
                to: 1400,
                color: 'rgba(0,128, 0, 0.9)'
            }, { // Specialist
                from: 1400,
                to: 1600,
                color: 'rgba(0,225,0,0.7)',
                
            }, { // Expert
                from: 1600,
                to: 1900,
                color: 'rgba(0, 0, 255, 0.5)',
                
            }, { // Candidate Master
                from: 1900,
                to: 2200,
                color: 'rgba(170,0,170,0.5)',
               
            }, { // Master
                from: 2200,
                to: 2300,
                color: 'rgba(255, 140, 0, 0.5)',
               
            }, { // International Master
                from: 2300,
                to: 2400,
                color: 'rgba(255, 140,0, 0.6)',
                
            },{ // Grandmaster
                from: 2400,
                to: 2600,
                color: 'rgba(255,0, 0, 0.4)',
                
            },{ // International Grandmaster
                from: 2600,
                to: 3500,
                color: 'rgba(255, 0, 0, 0.6)',
                
            }]
        },
        tooltip: {
           	formatter: function() {
        		return '</b> '+this.y+'<br/>'+this.point.options.event+'</b>';
    }
        },
        plotOptions: {
					series: {
						name: 'Fuck u',
						dataLabels: {
							color: '#FFFFFF'
						},
					 marker: {
						lineColor: '#FFFFFF'
					 }
			  	},
            spline: {
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 4
                    }
                },
				color: '#FFFFFF',
                marker: {
                    enabled: true
                },
				pointInterval: 3600000*24*7, // one hour
                pointStart: Date.UTC(2015, 12, 6)
            }
        },
        series: [{
            name: '',
            data: <?php echo json_encode($data); ?>

        }],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        }
    });
});
</script>
