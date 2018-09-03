<?php
echo 'Зад. 4<br />';

class Car
{
    function go()
    {
        echo 'Арендуемые автомобили.<br />';
    }
}

class SportCar extends Car
{
    public $speed;
    public $distance;
    public $transmission;
    use moveBackward;

    function __construct($speed = 0, $distance = 0, $transmission)
    {
        $this->speed = $speed;
        $this->distance = $distance;
        $this->transmission = $transmission;
    }

    function move()
    {
        parent::go();
        echo "У этого авто " . $this->speed . " м/с скорость и " . $this->transmission . " трансмиссия.";
        echo '<br />', "Должен проехать " . $this->distance . " метров.<br>";
        echo "Двигатель включен.<br>";
        if ($this->transmission == 'auto') {
            $this->transmissionAuto();
        } else {
            $this->transmissionManual();
        }
        echo "<br>";
        $this->engine();
        echo "Автомобиль остановился<br>";
        echo "Трансмиссия отключена<br>";
        echo "Двигатель отключен<br>";
    }

    function engine()
    {
        $hp = $this->speed / 2;
        $road = 0;
        $temperature = 0;
        $overHeatTemp = 90;
        echo "Мощность автомобиля " . $hp . " лошадинных сил<br>";
        while ($road < $this->distance) {
            $road += $this->speed;
            if ($temperature >= $overHeatTemp) {
                $temperature -= 10;
                echo "Вентилятор включен <br>";
            } else {
                $temperature += 5;
            }
            echo "Автомобиль проехал " . $road . " метров. <br>";
            echo "Температура " . $temperature . " градусов<br>";
        }
    }

    function transmissionAuto()
    {
        echo "У автомобиля, автоматическая коробка передач.<br>";
        $this->mBack();
    }

    function transmissionManual()
    {
        echo "У автомобиля ручная коробка передач. <br>";
        $maxSpeedForFirstGear = 20;
        if ($this->speed > $maxSpeedForFirstGear) {
            echo "Поехал на второй скорости.<br>";
        } else {
            echo "Поехал на первой скорости.<br>";
        }
        $this->mBack();
    }
}

trait moveBackward
{
    public function mBack()
    {
        echo "Заднеприводный.<br>";
    }
}

$bmw = new SportCar(20, 2000, 'автоматическая ');
$bmw->move();
$audi = new SportCar(20, 1500, 'ручная');
$audi->move();
