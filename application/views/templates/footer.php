

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Datepicker -->
    <!-- <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script> -->

    <!-- Data Tables and Search -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

    <!-- <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script> -->


    <!-- Select2 Option Boxes -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendor/chart.js/chart.bundle.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/chart.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/chart.min.js"></script>

    <!-- Highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <!-- SweetAlert -->
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    


    <script>

        

        
        $('.custom-file-input').on('change', function() {
            let fileName =  $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });


        $('.js-example-basic-single').select2();


        $('#data').DataTable();


        //jquery tolong carikan elemen yang nama kelasnya form-check-input, pd saat diklik jalankan fungsi berikut ini
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('menu/changeaccess')?>",
                type: 'post',
                data: {  //menuId objek data : menuId variabel yg udh diambil dari checkbox
                    menuId : menuId,
                    roleId: roleId
                },
                success:function() {
                    document.location.href = "<?= base_url('menu/roleaccess/'); ?>" + roleId;
                }
            })
        });


    </script>
        <script>
        // PIE CHART GENDER
Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Gender'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Gender',
        colorByPoint: true,
        data: [{
            name: 'Male',
            y: <?= $male; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Female',
            y: <?= $female; ?>
        }]
    }]
});

// PIE CHART EMPLOYEE STATUS
Highcharts.chart('pie2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Employee Status'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Employee Status',
        
        colorByPoint: true,
        data: [{
            name: 'Permanent',
            y: <?= $permanent; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Non Permanent',
            y: <?= $nonpermanent; ?>
        }]
    }]
});


// HighChart Position Level
Highcharts.chart('position', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Console Level'
    },
    xAxis: {
        categories: ['Other', 'Komite', 'Komisaris', 'BOD-2', 'BOD-1', 'BOD' ]
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    legend: {
        reversed: true
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} employees</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        
        name: 'Console Level',
        data: [<?= $other; ?>,  <?= $komite; ?>, <?= $komisaris; ?>, <?= $bod2; ?>, <?= $bod1; ?>, <?= $bod; ?> ]
    }]
});

// Level Employee
Highcharts.chart('level', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grade Level'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'I',
            'II',
            'III',
            'IV',
            'IX',
            'V',
            'VI',
            'VIII',
            'X',
            'XI',
            'XII',
            'XIII',
            'XIV',
            'XV'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Employee'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} employees</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Grade Level',
        data: [<?= $I; ?>,  <?= $II; ?>, <?= $III; ?>, <?= $IV; ?>, <?= $IX; ?>, <?= $V; ?>, <?= $VI; ?>,  <?= $VIII; ?>, <?= $X; ?>, <?= $XI; ?>, <?= $XII; ?>, <?= $XIII; ?>, <?= $XIV; ?>, <?= $XV; ?>]

    }]
});


// Highchart Age
Highcharts.chart('age', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Employees Age'
    },
    xAxis: {
        categories: [
            '<21',
            '21-25',
            '26-30',
            '31-35',
            '36-40',
            '41-45',
            '46-50',
            '>50'
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: ''
        }
    }, {
        title: {
            text: 'Employees'
        },
        opposite: false
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Female',
        color: 'rgb(46, 50, 58)',
        data: [<?= $f1; ?>, <?= $f2; ?>,<?= $f3; ?>,<?= $f4; ?>,<?= $f5; ?>,<?= $f6; ?>,<?= $f7; ?>,<?= $f8; ?>],
        tooltip: {
            valuePrefix: '',
            valueSuffix: ' employee'
        },
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        name: 'Male',
        color: 'rgb(124, 181, 236)',
        data: [<?= $m1; ?>, <?= $m2; ?>,<?= $m3; ?>,<?= $m4; ?>,<?= $m5; ?>,<?= $m6; ?>,<?= $m7; ?>,<?= $m8; ?>],
        tooltip: {
            valuePrefix: '',
            valueSuffix: ' employee'
        },
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
    }]
});


            </script>

</body>
<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rajawali Nusantara Indonesia <?= date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

</html>