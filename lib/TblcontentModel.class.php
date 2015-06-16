<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class TblcontentModel extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='TblcontentModel';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='tblcontent';
	const SQL_INSERT='INSERT INTO `tblcontent` (`id`,`content`,`allowComment`,`score`,`nScore`,`title`,`smallComment`,`position`,`addtime`,`img`,`gallery`) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `tblcontent` (`content`,`allowComment`,`score`,`nScore`,`title`,`smallComment`,`position`,`addtime`,`img`,`gallery`) VALUES (?,?,?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `tblcontent` SET `id`=?,`content`=?,`allowComment`=?,`score`=?,`nScore`=?,`title`=?,`smallComment`=?,`position`=?,`addtime`=?,`img`=?,`gallery`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `tblcontent` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `tblcontent` WHERE `id`=?';
	const FIELD_ID=-442519314;
	const FIELD_CONTENT=-1938555770;
	const FIELD_ALLOWCOMMENT=-97745175;
	const FIELD_SCORE=-1828936225;
	const FIELD_NSCORE=-1020730089;
	const FIELD_TITLE=-1827829339;
	const FIELD_SMALLCOMMENT=1726792555;
	const FIELD_POSITION=1349440188;
	const FIELD_ADDTIME=257252091;
	const FIELD_IMG=-833196464;
	const FIELD_GALLERY=1208565599;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_CONTENT=>'content',
		self::FIELD_ALLOWCOMMENT=>'allowComment',
		self::FIELD_SCORE=>'score',
		self::FIELD_NSCORE=>'nScore',
		self::FIELD_TITLE=>'title',
		self::FIELD_SMALLCOMMENT=>'smallComment',
		self::FIELD_POSITION=>'position',
		self::FIELD_ADDTIME=>'addtime',
		self::FIELD_IMG=>'img',
		self::FIELD_GALLERY=>'gallery');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_CONTENT=>'content',
		self::FIELD_ALLOWCOMMENT=>'allowComment',
		self::FIELD_SCORE=>'score',
		self::FIELD_NSCORE=>'nScore',
		self::FIELD_TITLE=>'title',
		self::FIELD_SMALLCOMMENT=>'smallComment',
		self::FIELD_POSITION=>'position',
		self::FIELD_ADDTIME=>'addtime',
		self::FIELD_IMG=>'img',
		self::FIELD_GALLERY=>'gallery');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_CONTENT=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ALLOWCOMMENT=>Db2PhpEntity::PHP_TYPE_BOOL,
		self::FIELD_SCORE=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_NSCORE=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_TITLE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SMALLCOMMENT=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_POSITION=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ADDTIME=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_IMG=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_GALLERY=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_CONTENT=>array(Db2PhpEntity::JDBC_TYPE_LONGVARCHAR,65535,0,false),
		self::FIELD_ALLOWCOMMENT=>array(Db2PhpEntity::JDBC_TYPE_BIT,0,0,false),
		self::FIELD_SCORE=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,false),
		self::FIELD_NSCORE=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_TITLE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_SMALLCOMMENT=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_POSITION=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,100,0,true),
		self::FIELD_ADDTIME=>array(Db2PhpEntity::JDBC_TYPE_TIMESTAMP,19,0,false),
		self::FIELD_IMG=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,255,0,true),
		self::FIELD_GALLERY=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_CONTENT=>'',
		self::FIELD_ALLOWCOMMENT=>'',
		self::FIELD_SCORE=>0,
		self::FIELD_NSCORE=>null,
		self::FIELD_TITLE=>null,
		self::FIELD_SMALLCOMMENT=>null,
		self::FIELD_POSITION=>null,
		self::FIELD_ADDTIME=>'CURRENT_TIMESTAMP',
		self::FIELD_IMG=>null,
		self::FIELD_GALLERY=>0);
	private $id;
	private $content;
	private $allowComment;
	private $score;
	private $nScore;
	private $title;
	private $smallComment;
	private $position;
	private $addtime;
	private $img;
	private $gallery;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return TblcontentModel
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
	 * set value for content 
	 *
	 * type:TEXT,size:65535,default:null
	 *
	 * @param mixed $content
	 * @return TblcontentModel
	 */
	public function &setContent($content) {
		$this->notifyChanged(self::FIELD_CONTENT,$this->content,$content);
		$this->content=$content;
		return $this;
	}

	/**
	 * get value for content 
	 *
	 * type:TEXT,size:65535,default:null
	 *
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * set value for allowComment 
	 *
	 * type:BIT,size:0,default:null
	 *
	 * @param mixed $allowComment
	 * @return TblcontentModel
	 */
	public function &setAllowComment($allowComment) {
		$this->notifyChanged(self::FIELD_ALLOWCOMMENT,$this->allowComment,$allowComment);
		$this->allowComment=$allowComment;
		return $this;
	}

	/**
	 * get value for allowComment 
	 *
	 * type:BIT,size:0,default:null
	 *
	 * @return mixed
	 */
	public function getAllowComment() {
		return $this->allowComment;
	}

	/**
	 * set value for score 
	 *
	 * type:DOUBLE,size:22,default:null
	 *
	 * @param mixed $score
	 * @return TblcontentModel
	 */
	public function &setScore($score) {
		$this->notifyChanged(self::FIELD_SCORE,$this->score,$score);
		$this->score=$score;
		return $this;
	}

	/**
	 * get value for score 
	 *
	 * type:DOUBLE,size:22,default:null
	 *
	 * @return mixed
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * set value for nScore 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $nScore
	 * @return TblcontentModel
	 */
	public function &setNScore($nScore) {
		$this->notifyChanged(self::FIELD_NSCORE,$this->nScore,$nScore);
		$this->nScore=$nScore;
		return $this;
	}

	/**
	 * get value for nScore 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getNScore() {
		return $this->nScore;
	}

	/**
	 * set value for title 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $title
	 * @return TblcontentModel
	 */
	public function &setTitle($title) {
		$this->notifyChanged(self::FIELD_TITLE,$this->title,$title);
		$this->title=$title;
		return $this;
	}

	/**
	 * get value for title 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * set value for smallComment 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $smallComment
	 * @return TblcontentModel
	 */
	public function &setSmallComment($smallComment) {
		$this->notifyChanged(self::FIELD_SMALLCOMMENT,$this->smallComment,$smallComment);
		$this->smallComment=$smallComment;
		return $this;
	}

	/**
	 * get value for smallComment 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getSmallComment() {
		return $this->smallComment;
	}

	/**
	 * set value for position 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @param mixed $position
	 * @return TblcontentModel
	 */
	public function &setPosition($position) {
		$this->notifyChanged(self::FIELD_POSITION,$this->position,$position);
		$this->position=$position;
		return $this;
	}

	/**
	 * get value for position 
	 *
	 * type:VARCHAR,size:100,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * set value for addtime 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @param mixed $addtime
	 * @return TblcontentModel
	 */
	public function &setAddtime($addtime) {
		$this->notifyChanged(self::FIELD_ADDTIME,$this->addtime,$addtime);
		$this->addtime=$addtime;
		return $this;
	}

	/**
	 * get value for addtime 
	 *
	 * type:TIMESTAMP,size:19,default:CURRENT_TIMESTAMP
	 *
	 * @return mixed
	 */
	public function getAddtime() {
		return $this->addtime;
	}

	/**
	 * set value for img 
	 *
	 * type:VARCHAR,size:255,default:null,nullable
	 *
	 * @param mixed $img
	 * @return TblcontentModel
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
	 * set value for gallery 
	 *
	 * type:INT,size:10,default:0,nullable
	 *
	 * @param mixed $gallery
	 * @return TblcontentModel
	 */
	public function &setGallery($gallery) {
		$this->notifyChanged(self::FIELD_GALLERY,$this->gallery,$gallery);
		$this->gallery=$gallery;
		return $this;
	}

	/**
	 * get value for gallery 
	 *
	 * type:INT,size:10,default:0,nullable
	 *
	 * @return mixed
	 */
	public function getGallery() {
		return $this->gallery;
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
			self::FIELD_CONTENT=>$this->getContent(),
			self::FIELD_ALLOWCOMMENT=>$this->getAllowComment(),
			self::FIELD_SCORE=>$this->getScore(),
			self::FIELD_NSCORE=>$this->getNScore(),
			self::FIELD_TITLE=>$this->getTitle(),
			self::FIELD_SMALLCOMMENT=>$this->getSmallComment(),
			self::FIELD_POSITION=>$this->getPosition(),
			self::FIELD_ADDTIME=>$this->getAddtime(),
			self::FIELD_IMG=>$this->getImg(),
			self::FIELD_GALLERY=>$this->getGallery());
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
	 * Match by attributes of passed example instance and return matched rows as an array of TblcontentModel instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param TblcontentModel $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return TblcontentModel[]
	 */
	public static function findByExample(PDO $db,TblcontentModel $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of TblcontentModel instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return TblcontentModel[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `tblcontent`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of TblcontentModel instances
	 *
	 * @param PDOStatement $stmt
	 * @return TblcontentModel[]
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
	 * returns the result as an array of TblcontentModel instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return TblcontentModel[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new TblcontentModel();
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
	 * Execute select query and return matched rows as an array of TblcontentModel instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return TblcontentModel[]
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
		$sql='DELETE FROM `tblcontent`'
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
		$this->setContent($result['content']);
		$this->setAllowComment($result['allowComment']);
		$this->setScore($result['score']);
		$this->setNScore($result['nScore']);
		$this->setTitle($result['title']);
		$this->setSmallComment($result['smallComment']);
		$this->setPosition($result['position']);
		$this->setAddtime($result['addtime']);
		$this->setImg($result['img']);
		$this->setGallery($result['gallery']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return TblcontentModel
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
		$o=new TblcontentModel();
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
		$stmt->bindValue(2,$this->getContent());
		$stmt->bindValue(3,$this->getAllowComment());
		$stmt->bindValue(4,$this->getScore());
		$stmt->bindValue(5,$this->getNScore());
		$stmt->bindValue(6,$this->getTitle());
		$stmt->bindValue(7,$this->getSmallComment());
		$stmt->bindValue(8,$this->getPosition());
		$stmt->bindValue(9,$this->getAddtime());
		$stmt->bindValue(10,$this->getImg());
		$stmt->bindValue(11,$this->getGallery());
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
			$stmt->bindValue(1,$this->getContent());
			$stmt->bindValue(2,$this->getAllowComment());
			$stmt->bindValue(3,$this->getScore());
			$stmt->bindValue(4,$this->getNScore());
			$stmt->bindValue(5,$this->getTitle());
			$stmt->bindValue(6,$this->getSmallComment());
			$stmt->bindValue(7,$this->getPosition());
			$stmt->bindValue(8,$this->getAddtime());
			$stmt->bindValue(9,$this->getImg());
			$stmt->bindValue(10,$this->getGallery());
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
		$stmt->bindValue(12,$this->getId());
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
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		return self::hashToDomDocument($this->toHash(), 'TblcontentModel');
	}

	/**
	 * get single TblcontentModel instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return TblcontentModel
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new TblcontentModel();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of TblcontentModel from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return TblcontentModel[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('TblcontentModel') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>