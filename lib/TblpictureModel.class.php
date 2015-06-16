<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class TblpictureModel extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='TblpictureModel';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='tblpicture';
	const SQL_INSERT='INSERT INTO `tblpicture` (`id`,`img`,`prio`,`dateAdded`,`galleryId`,`FaDesc`,`EnDesc`) VALUES (?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `tblpicture` (`img`,`prio`,`dateAdded`,`galleryId`,`FaDesc`,`EnDesc`) VALUES (?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `tblpicture` SET `id`=?,`img`=?,`prio`=?,`dateAdded`=?,`galleryId`=?,`FaDesc`=?,`EnDesc`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `tblpicture` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `tblpicture` WHERE `id`=?';
	const FIELD_ID=2022833737;
	const FIELD_IMG=-1716663211;
	const FIELD_PRIO=-1676738474;
	const FIELD_DATEADDED=-2021679868;
	const FIELD_GALLERYID=-1425083617;
	const FIELD_FADESC=-1952169926;
	const FIELD_ENDESC=-1968793304;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_IMG=>'img',
		self::FIELD_PRIO=>'prio',
		self::FIELD_DATEADDED=>'dateAdded',
		self::FIELD_GALLERYID=>'galleryId',
		self::FIELD_FADESC=>'FaDesc',
		self::FIELD_ENDESC=>'EnDesc');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_IMG=>'img',
		self::FIELD_PRIO=>'prio',
		self::FIELD_DATEADDED=>'dateAdded',
		self::FIELD_GALLERYID=>'galleryId',
		self::FIELD_FADESC=>'FaDesc',
		self::FIELD_ENDESC=>'EnDesc');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_IMG=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_PRIO=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_DATEADDED=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_GALLERYID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_FADESC=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ENDESC=>Db2PhpEntity::PHP_TYPE_STRING);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_IMG=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_PRIO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_DATEADDED=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,false),
		self::FIELD_GALLERYID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_FADESC=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_ENDESC=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_IMG=>null,
		self::FIELD_PRIO=>null,
		self::FIELD_DATEADDED=>'CURRENT_TIMESTAMP',
		self::FIELD_GALLERYID=>null,
		self::FIELD_FADESC=>null,
		self::FIELD_ENDESC=>null);
	private $id;
	private $img;
	private $prio;
	private $dateAdded;
	private $galleryId;
	private $FaDesc;
	private $EnDesc;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return TblpictureModel
	 */
	public function &setId($id) {
		$this->notifyChanged(self::FIELD_ID,$this->id,$id);
		$this->id=$id;
		return $this;
	}

	/**
	 * get value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * set value for img 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $img
	 * @return TblpictureModel
	 */
	public function &setImg($img) {
		$this->notifyChanged(self::FIELD_IMG,$this->img,$img);
		$this->img=$img;
		return $this;
	}

	/**
	 * get value for img 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getImg() {
		return $this->img;
	}

	/**
	 * set value for prio 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $prio
	 * @return TblpictureModel
	 */
	public function &setPrio($prio) {
		$this->notifyChanged(self::FIELD_PRIO,$this->prio,$prio);
		$this->prio=$prio;
		return $this;
	}

	/**
	 * get value for prio 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getPrio() {
		return $this->prio;
	}

	/**
	 * set value for dateAdded 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @param mixed $dateAdded
	 * @return TblpictureModel
	 */
	public function &setDateAdded($dateAdded) {
		$this->notifyChanged(self::FIELD_DATEADDED,$this->dateAdded,$dateAdded);
		$this->dateAdded=$dateAdded;
		return $this;
	}

	/**
	 * get value for dateAdded 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @return mixed
	 */
	public function getDateAdded() {
		return $this->dateAdded;
	}

	/**
	 * set value for galleryId 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @param mixed $galleryId
	 * @return TblpictureModel
	 */
	public function &setGalleryId($galleryId) {
		$this->notifyChanged(self::FIELD_GALLERYID,$this->galleryId,$galleryId);
		$this->galleryId=$galleryId;
		return $this;
	}

	/**
	 * get value for galleryId 
	 *
	 * type:INT,size:10,default:null,index,nullable
	 *
	 * @return mixed
	 */
	public function getGalleryId() {
		return $this->galleryId;
	}

	/**
	 * set value for FaDesc 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $FaDesc
	 * @return TblpictureModel
	 */
	public function &setFaDesc($FaDesc) {
		$this->notifyChanged(self::FIELD_FADESC,$this->FaDesc,$FaDesc);
		$this->FaDesc=$FaDesc;
		return $this;
	}

	/**
	 * get value for FaDesc 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFaDesc() {
		return $this->FaDesc;
	}

	/**
	 * set value for EnDesc 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $EnDesc
	 * @return TblpictureModel
	 */
	public function &setEnDesc($EnDesc) {
		$this->notifyChanged(self::FIELD_ENDESC,$this->EnDesc,$EnDesc);
		$this->EnDesc=$EnDesc;
		return $this;
	}

	/**
	 * get value for EnDesc 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getEnDesc() {
		return $this->EnDesc;
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public static function getTableName() {
		return self::SQL_TABLE_NAME;
	}

	/**
	 * Get array with field id as index and field name as value
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return self::$FIELD_NAMES;
	}

	/**
	 * Get array with field id as index and property name as value
	 *
	 * @return array
	 */
	public static function getPropertyNames() {
		return self::$PROPERTY_NAMES;
	}

	/**
	 * get the field name for the passed field id.
	 *
	 * @param int $fieldId
	 * @param bool $fullyQualifiedName true if field name should be qualified by table name
	 * @return string field name for the passed field id, null if the field doesn't exist
	 */
	public static function getFieldNameByFieldId($fieldId, $fullyQualifiedName=true) {
		if (!array_key_exists($fieldId, self::$FIELD_NAMES)) {
			return null;
		}
		$fieldName=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$fieldId] . self::SQL_IDENTIFIER_QUOTE;
		if ($fullyQualifiedName) {
			return self::SQL_IDENTIFIER_QUOTE . self::SQL_TABLE_NAME . self::SQL_IDENTIFIER_QUOTE . '.' . $fieldName;
		}
		return $fieldName;
	}

	/**
	 * Get array with field ids of identifiers
	 *
	 * @return array
	 */
	public static function getIdentifierFields() {
		return self::$PRIMARY_KEYS;
	}

	/**
	 * Get array with field ids of autoincrement fields
	 *
	 * @return array
	 */
	public static function getAutoincrementFields() {
		return self::$AUTOINCREMENT_FIELDS;
	}

	/**
	 * Get array with field id as index and property type as value
	 *
	 * @return array
	 */
	public static function getPropertyTypes() {
		return self::$PROPERTY_TYPES;
	}

	/**
	 * Get array with field id as index and field type as value
	 *
	 * @return array
	 */
	public static function getFieldTypes() {
		return self::$FIELD_TYPES;
	}

	/**
	 * Assign default values according to table
	 * 
	 */
	public function assignDefaultValues() {
		$this->assignByArray(self::$DEFAULT_VALUES);
	}


	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash() {
		$array=$this->toArray();
		$hash=array();
		foreach ($array as $fieldId=>$value) {
			$hash[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		return $hash;
	}

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray() {
		return array(
			self::FIELD_ID=>$this->getId(),
			self::FIELD_IMG=>$this->getImg(),
			self::FIELD_PRIO=>$this->getPrio(),
			self::FIELD_DATEADDED=>$this->getDateAdded(),
			self::FIELD_GALLERYID=>$this->getGalleryId(),
			self::FIELD_FADESC=>$this->getFaDesc(),
			self::FIELD_ENDESC=>$this->getEnDesc());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_ID=>$this->getId());
	}

	/**
	 * cached statements
	 *
	 * @var array<string,array<string,PDOStatement>>
	 */
	private static $stmts=array();
	private static $cacheStatements=true;
	
	/**
	 * prepare passed string as statement or return cached if enabled and available
	 *
	 * @param PDO $db
	 * @param string $statement
	 * @return PDOStatement
	 */
	protected static function prepareStatement(PDO $db, $statement) {
		if(self::isCacheStatements()) {
			if (in_array($statement, array(self::SQL_INSERT, self::SQL_INSERT_AUTOINCREMENT, self::SQL_UPDATE, self::SQL_SELECT_PK, self::SQL_DELETE_PK))) {
				$dbInstanceId=spl_object_hash($db);
				if (empty(self::$stmts[$statement][$dbInstanceId])) {
					self::$stmts[$statement][$dbInstanceId]=$db->prepare($statement);
				}
				return self::$stmts[$statement][$dbInstanceId];
			}
		}
		return $db->prepare($statement);
	}

	/**
	 * Enable statement cache
	 *
	 * @param bool $cache
	 */
	public static function setCacheStatements($cache) {
		self::$cacheStatements=true==$cache;
	}

	/**
	 * Check if statement cache is enabled
	 *
	 * @return bool
	 */
	public static function isCacheStatements() {
		return self::$cacheStatements;
	}
	
	/**
	 * check if this instance exists in the database
	 *
	 * @param PDO $db
	 * @return bool
	 */
	public function existsInDatabase(PDO $db) {
		$filter=array();
		foreach ($this->getPrimaryKeyValues() as $fieldId=>$value) {
			$filter[]=new DFC($fieldId, $value, DFC::EXACT_NULLSAFE);
		}
		return 0!=count(self::findByFilter($db, $filter, true));
	}
	
	/**
	 * Update to database if exists, otherwise insert
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateInsertToDatabase(PDO $db) {
		if ($this->existsInDatabase($db)) {
			return $this->updateToDatabase($db);
		} else {
			return $this->insertIntoDatabase($db);
		}
	}

	/**
	 * Query by Example.
	 *
	 * Match by attributes of passed example instance and return matched rows as an array of TblpictureModel instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param TblpictureModel $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return TblpictureModel[]
	 */
	public static function findByExample(PDO $db,TblpictureModel $example, $and=true, $sort=null) {
		$exampleValues=$example->toArray();
		$filter=array();
		foreach ($exampleValues as $fieldId=>$value) {
			if (null!==$value) {
				$filter[$fieldId]=$value;
			}
		}
		return self::findByFilter($db, $filter, $and, $sort);
	}

	/**
	 * Query by filter.
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * Will return matched rows as an array of TblpictureModel instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return TblpictureModel[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `tblpicture`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of TblpictureModel instances
	 *
	 * @param PDOStatement $stmt
	 * @return TblpictureModel[]
	 */
	public static function fromStatement(PDOStatement $stmt) {
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * returns the result as an array of TblpictureModel instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return TblpictureModel[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new TblpictureModel();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Get sql WHERE part from filter.
	 *
	 * @param array $filter
	 * @param bool $and
	 * @param bool $fullyQualifiedNames true if field names should be qualified by table name
	 * @param bool $prependWhere true if WHERE should be prepended to conditions
	 * @return string
	 */
	public static function buildSqlWhere($filter, $and, $fullyQualifiedNames=true, $prependWhere=false) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		return $filter->buildSqlWhere(new self::$CLASS_NAME, $fullyQualifiedNames, $prependWhere);
	}

	/**
	 * get sql ORDER BY part from DSCs
	 *
	 * @param array $sort array of DSC instances
	 * @return string
	 */
	protected static function buildSqlOrderBy($sort) {
		return DSC::buildSqlOrderBy(new self::$CLASS_NAME, $sort);
	}

	/**
	 * bind values from filter to statement
	 *
	 * @param PDOStatement $stmt
	 * @param DFCInterface $filter
	 */
	public static function bindValuesForFilter(PDOStatement &$stmt, DFCInterface $filter) {
		$filter->bindValuesForFilter(new self::$CLASS_NAME, $stmt);
	}

	/**
	 * Execute select query and return matched rows as an array of TblpictureModel instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return TblpictureModel[]
	 */
	public static function findBySql(PDO $db, $sql) {
		$stmt=$db->query($sql);
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * Delete rows matching the filter
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * @param PDO $db
	 * @param array $filter
	 * @param bool $and
	 * @return mixed
	 */
	public static function deleteByFilter(PDO $db, $filter, $and=true) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		if (0==count($filter)) {
			throw new InvalidArgumentException('refusing to delete without filter'); // just comment out this line if you are brave
		}
		$sql='DELETE FROM `tblpicture`'
		. self::buildSqlWhere($filter, $and, false, true);
		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array) {
		$result=array();
		foreach ($array as $fieldId=>$value) {
			$result[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		$this->assignByHash($result);
	}

	/**
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result) {
		$this->setId($result['id']);
		$this->setImg($result['img']);
		$this->setPrio($result['prio']);
		$this->setDateAdded($result['dateAdded']);
		$this->setGalleryId($result['galleryId']);
		$this->setFaDesc($result['FaDesc']);
		$this->setEnDesc($result['EnDesc']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return TblpictureModel
	 */
	public static function findById(PDO $db,$id) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$id);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		if(!$result) {
			return null;
		}
		$o=new TblpictureModel();
		$o->assignByHash($result);
		$o->notifyPristine();
		return $o;
	}

	/**
	 * Bind all values to statement
	 *
	 * @param PDOStatement $stmt
	 */
	protected function bindValues(PDOStatement &$stmt) {
		$stmt->bindValue(1,$this->getId());
		$stmt->bindValue(2,$this->getImg());
		$stmt->bindValue(3,$this->getPrio());
		$stmt->bindValue(4,$this->getDateAdded());
		$stmt->bindValue(5,$this->getGalleryId());
		$stmt->bindValue(6,$this->getFaDesc());
		$stmt->bindValue(7,$this->getEnDesc());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		if (null===$this->getId()) {
			$stmt=self::prepareStatement($db,self::SQL_INSERT_AUTOINCREMENT);
			$stmt->bindValue(1,$this->getImg());
			$stmt->bindValue(2,$this->getPrio());
			$stmt->bindValue(3,$this->getDateAdded());
			$stmt->bindValue(4,$this->getGalleryId());
			$stmt->bindValue(5,$this->getFaDesc());
			$stmt->bindValue(6,$this->getEnDesc());
		} else {
			$stmt=self::prepareStatement($db,self::SQL_INSERT);
			$this->bindValues($stmt);
		}
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$lastInsertId=$db->lastInsertId();
		if (false!==$lastInsertId) {
			$this->setId($lastInsertId);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_UPDATE);
		$this->bindValues($stmt);
		$stmt->bindValue(8,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_DELETE_PK);
		$stmt->bindValue(1,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Fetch TblgalleryModel which references this TblpictureModel. Will return null in case reference is invalid.
	 * `tblpicture`.`galleryId` -> `tblgallery`.`id`
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $sort array of DSC instances
	 * @return TblgalleryModel
	 */
	public function fetchTblgalleryModel(PDO $db, $sort=null) {
		$filter=array(TblgalleryModel::FIELD_ID=>$this->getGalleryId());
		$result=TblgalleryModel::findByFilter($db, $filter, true, $sort);
		return empty($result) ? null : $result[0];
	}


	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		return self::hashToDomDocument($this->toHash(), 'TblpictureModel');
	}

	/**
	 * get single TblpictureModel instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return TblpictureModel
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new TblpictureModel();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of TblpictureModel from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return TblpictureModel[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('TblpictureModel') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>