<table class="table table-responsive" id="notas-table">
        <style type="text/css">
            .clearfix:after {
            content: "";
            display: table;
            clear: both;
            }
            a {
            color: #000;
            text-decoration: none;
            text-transform: lowercase;
            }
            body {
            position: relative;
            width: 100%;
            height: 25cm;
            margin: 0 auto;
            color: #000000;
            /*background: #FFFFFF; */
            font-size: 13px;
            font-family: Arial;
            font-weight: normal;
            /*background-image: url('{{url('/')}}/img/
            logoBohio2.png');*/
            }
            header {
            width: 27cm;
            height: 20cm;
            padding: 40px 0;}
            padding: 5px 0;
            margin-bottom: 5px;
            border-bottom: 1px solid #AAAAAA;
            #logo {
            float: left;
            margin-top: 8px;
            }
            #logo img {
            height: 100px;
            }
            #company {
            /*float: right;*/
            text-align: right;
            }
            #details {
            margin-bottom: 10px;
            }
            #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
            }
            #client .to {#client .to {
            color: #777777;
            }
            h2.name {
            font-size: 1.2em;
            font-weight: normal;
            margin: 0;
            }
            #invoice {
            /*float: right;*/
            /*text-align: right;*/
            }
            #invoice h1 {
            color: #0087C3;
            font-size: 1.2em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 5px 0;
            }
            #invoice .date {
            font-size: 1.1em;
            color: #777777;
            }
            table {
            width: 100%;}
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            /*margin-bottom: 5px;*/
            font-family: Arial;
            margin-left: 9px;
            margin-right: 15px;
            margin-top: 10px;
            table th {
            padding: 40px;
            /*background: #CCC;*/
            /*text-align: center;*/
            border-bottom: 1px solid #000;
            }
            table td {
            /*background: #FFF;*/
            border-bottom: 1px dotted #000;
            text-align: center;
            }
            table th {
            white-space: nowrap;
            font-weight: normal;
            text-align: center;
            background: forestgreen;
            color: floralwhite;
            height: 20px;
            border-bottom: green;
            }
            table tbody td {
            text-align: center;
            }table td .h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
            text-align: center;
            }
            table .no {
            color: #FFFFFF;
            font-size: 1em;
            background: #57B223;
            text-align: center;
            }
            table .desc {
            text-align: left;
            }
            table .unit {
            background: #DDDDDD;
            }
            table .qty {
            }
            table .total {
            background: #57B223;
            color: #FFFFFF;
            }table td.unit,
            table td.qty,
            table td.total {
            font-size: 1em;
            }
            table tbody tr:last-child td {
            border: none;
            }
            table tfoot td {
            padding: 5px 5px;
            /*background: #FFFFFF;*/
            border-bottom: none;
            font-size: 1.1em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
            }
            table tfoot tr:first-child td {
            border-top: none;
            }
            table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.1em;
            border-top: 1px solid #57B223;
            }table tfoot tr td:first-child {
            border: none;
            }
            #thanks{
            font-size: 1.2em;
            margin-bottom: 10px;
            }
            #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            }
            #notices .notice {
            font-size: 1.2em;
            }
            footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
            }
            </style>  
   
    <thead> 
           
       
        <tr>
        <th>Id Asignatura</th>    
        <th>Asignatura</th>
        <th>Grupo</th>
        <th>Docente</th>
        <th>Id Estudiante</th>
        <th>Estudiante</th>
        <th>Corte1</th>
        <th>Corte2</th>
        <th>Corte3</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($pdfs as $notas)
        <tr>
            <td>{!! $notas->id_asignatura !!}</td>
            <td>{!! $notas->asignatura !!}</td>
            <td>{!! $notas->grupo !!}</td>
            <td>{!! $notas->docente !!}</td>
            <td>{!! $notas->id_estudiante !!}</td>
            <td>{!! $notas->estudiante !!}</td>
            <td>{!! $notas->corte1 !!}</td>
            <td>{!! $notas->corte2 !!}</td>
            <td>{!! $notas->corte3 !!}</td>
            <td>
                
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
    </tfooter>
</table>