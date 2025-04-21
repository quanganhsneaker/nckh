@extends('main')
@section('content')
<style>
.qa {

    text-align: center;
}

.qa h2 {
    margin: 20px;
   
}

.qa table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
    border: 2px solid black;
    margin-bottom: 70px;
}

.qa th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: center  ;
    color: black;
}

.qa th {
    background-color: #f2f2f2;
}

.blue { background-color: #0099FF; color:  black; }
.green { background-color: #33CC33; color: black; }
.yellow { background-color: #FFFF00; color: black; }
.orange { background-color: #FF9900; color: black; }
.red { background-color: #FF0000; color:  black; }
.brown { background-color: #663300; color: black; }
</style>
<div class="qa">
    <h2> Bảng phân loại chất lượng nước</h2>
    <table>
        <tr>
            <th>Khoảng giá trị WQI</th>
            <th>Mức đánh giá chất lượng nước</th>
            <th>Chất lượng nước</th>
            <th>Màu</th>
        </tr>
        <tr>
            <td>91 - 100</td>
            <td>Sử dụng tốt cho mục đích cấp nước sinh hoạt</td>
            <td>Rất tốt</td>
            <td class="blue">Xanh nước biển</td>
        </tr>
        <tr>
            <td>76 - 90</td>
            <td>Sử dụng cho mục đích cấp nước sinh hoạt nhưng cần các biện pháp xử lý phù hợp</td>
            <td>Tốt</td>
            <td class="green">Xanh lá cây</td>
        </tr>
        <tr>
            <td>51 - 75</td>
            <td>Sử dụng cho mục đích tưới tiêu và các mục đích tương đương khác</td>
            <td>Trung bình</td>
            <td class="yellow">Vàng</td>
        </tr>
        <tr>
            <td>26 - 50</td>
            <td>Sử dụng cho giao thông thủy và các mục đích tương đương khác</td>
            <td>Kém</td>
            <td class="orange">Da cam</td>
        </tr>
        <tr>
            <td>10 - 25</td>
            <td>Nước ô nhiễm nặng, cần các biện pháp xử lý trong tương lai</td>
            <td>Ô nhiễm nặng</td>
            <td class="red">Đỏ</td>
        </tr>
        <tr>
            <td>&lt;10</td>
            <td>Nước nhiễm độc, cần có biện pháp khắc phục, xử lý</td>
            <td>Ô nhiễm rất nặng</td>
            <td class="brown">Nâu</td>
        </tr>
    </table>
    <table>
        <tr>
            <th>TT</th>
            <th>Hồ</th>
            <th>Kí hiệu mẫu</th>
            <th>*Diện tích (ha)</th>
            <th>*Chiều sâu (m)</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Hồ Tây</td>
            <td>HT</td>
            <td>446</td>
            <td>2 - 4</td>
        </tr>
        <h2>Bảng thông tin các hồ</h2>
        <tr>
            <td>2</td>
            <td>Hồ Trúc Bạch</td>
            <td>TB</td>
            <td>22</td>
            <td>1,5 - 2</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Hồ Bảy Mẫu</td>
            <td>7M</td>
            <td>21,3</td>
            <td>2 - 2,5</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Hồ Gươm</td>
            <td>HG</td>
            <td>12</td>
            <td>1,5 - 2</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Hồ Thủ Lệ</td>
            <td>TL</td>
            <td>9,9</td>
            <td>2 - 3</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Hồ Thành Công</td>
            <td>TC</td>
            <td>6,5</td>
            <td>3 - 4</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Hồ Giảng Võ</td>
            <td>GV</td>
            <td>6</td>
            <td>3</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Hồ Thiền Quang</td>
            <td>TQ</td>
            <td>5,5</td>
            <td>3 - 4</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Hồ Ba Mẫu</td>
            <td>3M</td>
            <td>4,6</td>
            <td>2,5 - 3</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Hồ Ngọc Khánh</td>
            <td>NK</td>
            <td>3,5</td>
            <td>2,5</td>
        </tr>
    </table>
    <h2>Bảng thông số nước hồ</h2>
    <table>
        <tr>
            <th rowspan="2">Thông số</th>
            <th colspan="10">Hồ</th>
            <th rowspan="2">QCVN 08:2008/BTNMT (Cột A2)</th>
        </tr>
        <tr>
            <th>3M</th> <th>7M</th> <th>HG</th> <th>GV</th> <th>NK</th> <th>HT</th> <th>TC</th> <th>TQ</th> <th>TL</th> <th>TB</th>
        </tr>
        
        <!-- pH -->
        <tr><td rowspan="3">pH</td>
            <td>8.1</td> <td>7.9</td> <td>9.1</td> <td>7.9</td> <td>7.8</td> <td>8.3</td> <td>8.4</td> <td>7.9</td> <td>8.2</td> <td>7.8</td> 
            <td rowspan="3">6 - 8.5</td>
        </tr>
        <tr>
            <td>8.0</td> <td>7.9</td> <td>8.8</td> <td>7.9</td> <td>7.8</td> <td>8.2</td> <td>8.3</td> <td>7.8</td> <td>8.1</td> <td>7.8</td>
        </tr>
        <tr>
            <td>8.2</td> <td>7.9</td> <td>9.0</td> <td>7.8</td> <td>7.9</td> <td>8.2</td> <td>8.3</td> <td>7.8</td> <td>8.2</td> <td>7.8</td>
        </tr>
        
        <!-- Nhiệt độ -->
        <tr><td rowspan="3">t°C</td>
            <td>25.7</td> <td>25.6</td> <td>25.5</td> <td>26</td> <td>25</td> <td>21.7</td> <td>25.4</td> <td>25.5</td> <td>25.7</td> <td>25.5</td> 
            <td rowspan="3">-</td>
        </tr>
        <tr>
            <td>25.5</td> <td>25.6</td> <td>25.7</td> <td>26</td> <td>25</td> <td>21.8</td> <td>25.4</td> <td>25.5</td> <td>25.7</td> <td>25.5</td>
        </tr>
        <tr>
            <td>25.4</td> <td>25.5</td> <td>25.5</td> <td>26</td> <td>25</td> <td>21.9</td> <td>25.3</td> <td>25.4</td> <td>25.6</td> <td>25.4</td>
        </tr>

        <!-- TDS -->
        <tr><td rowspan="3">TDS (mg/l)</td>
            <td>238.1</td> <td>222.8</td> <td>74.2</td> <td>376.1</td> <td>190.4</td> <td>179.8</td> <td>179.8</td> <td>179.8</td> <td>311.6</td> <td>291</td> 
            <td rowspan="3">-</td>
        </tr>
        <tr>
            <td>291</td> <td>292</td> <td>92</td> <td>358</td> <td>514</td> <td>291</td> <td>291</td> <td>290</td> <td>293</td> <td>291</td>
        </tr>
        <tr>
            <td>292</td> <td>292</td> <td>92</td> <td>358</td> <td>514</td> <td>291</td> <td>291</td> <td>290</td> <td>293</td> <td>291</td>
        </tr>

        <!-- EC -->
        <tr><td rowspan="3">EC (µS/cm)</td>
            <td>419</td> <td>393.9</td> <td>132.6</td> <td>492.7</td> <td>644.6</td> <td>334.8</td> <td>403.3</td> <td>361.3</td> <td>321.8</td> <td>550.9</td> 
            <td rowspan="3">-</td>
        </tr>
        <tr>
            <td>490.7</td> <td>456</td> <td>150.4</td> <td>583.4</td> <td>813.3</td> <td>465.9</td> <td>463.8</td> <td>420.1</td> <td>366.1</td> <td>646.3</td>
        </tr>
        <tr>
            <td>374.2</td> <td>395.3</td> <td>110.6</td> <td>446.2</td> <td>943.2</td> <td>431.8</td> <td>380.2</td> <td>325.4</td> <td>455.5</td> <td>435.0</td>
        </tr>
    </table>
</div>
@endsection