mkdir -p ../Application/$1/$2/$3
cat Template/InputPortTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g | sed s/#usecase#/$3/g > ../Application/$1/$2/$3/I$2$3InputPort.php
cat Template/OutputPortTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g | sed s/#usecase#/$3/g > ../Application/$1/$2/$3/I$2$3OutputPort.php
cat Template/InputDataTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g | sed s/#usecase#/$3/g > ../Application/$1/$2/$3/$2$3InputData.php
cat Template/OutputDataTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g | sed s/#usecase#/$3/g > ../Application/$1/$2/$3/$2$3OutputData.php
cat Template/InteractorTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g | sed s/#usecase#/$3/g > ../Application/$1/$2/$3/$2$3Interactor.php