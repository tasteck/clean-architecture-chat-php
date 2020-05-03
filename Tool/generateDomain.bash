mkdir -p ../Domain/$1/Model/$2
cat Template/ModelTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g > ../Domain/$1/Model/$2/$2.php
cat Template/FactoryTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g > ../Domain/$1/Model/$2/I$2Factory.php
cat Template/RepositoryTemplate | sed s/#package#/$1/g |sed s/#aggregation#/$2/g > ../Domain/$1/Model/$2/I$2Repository.php

mkdir -p ../Infrastructure/$1/$2