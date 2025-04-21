document.addEventListener("DOMContentLoaded", function () {
    const locations = ["Nghĩa Đô", "Cầu Mới", "Phương Liệt", "Tựu Liệt", "Định Công", "Cầu Sét"];
    const doValues = [1.3, 1.1, 2.5, 2.2, 3.1, 1.5];

    const ctx = document.getElementById("mien1").getContext("2d"); // sử dụng id "mien1"

    const chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: locations,
            datasets: [{
                label: "DO (mg/L)",
                data: doValues,
                fill: true,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Biểu đồ DO (mg/L) theo điểm đo",
                    font: { size: 18 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "DO (mg/L)"
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: "Điểm quan trắc"
                    }
                }
            }
        }
    });
});
