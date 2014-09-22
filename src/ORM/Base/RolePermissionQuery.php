<?php

namespace ORM\Base;

use \Exception;
use \PDO;
use ORM\RolePermission as ChildRolePermission;
use ORM\RolePermissionQuery as ChildRolePermissionQuery;
use ORM\Map\RolePermissionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'role_permission' table.
 *
 *
 *
 * @method     ChildRolePermissionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRolePermissionQuery orderByCreateCustomer($order = Criteria::ASC) Order by the create_customer column
 * @method     ChildRolePermissionQuery orderByReadCustomer($order = Criteria::ASC) Order by the read_customer column
 * @method     ChildRolePermissionQuery orderByUpdateCustomer($order = Criteria::ASC) Order by the update_customer column
 * @method     ChildRolePermissionQuery orderByDestroyCustomer($order = Criteria::ASC) Order by the destroy_customer column
 * @method     ChildRolePermissionQuery orderByCreateProduct($order = Criteria::ASC) Order by the create_product column
 * @method     ChildRolePermissionQuery orderByReadProduct($order = Criteria::ASC) Order by the read_product column
 * @method     ChildRolePermissionQuery orderByUpdateProduct($order = Criteria::ASC) Order by the update_product column
 * @method     ChildRolePermissionQuery orderByDestroyProduct($order = Criteria::ASC) Order by the destroy_product column
 * @method     ChildRolePermissionQuery orderByCreatePurchase($order = Criteria::ASC) Order by the create_purchase column
 * @method     ChildRolePermissionQuery orderByReadPurchase($order = Criteria::ASC) Order by the read_purchase column
 * @method     ChildRolePermissionQuery orderByUpdatePurchase($order = Criteria::ASC) Order by the update_purchase column
 * @method     ChildRolePermissionQuery orderByDestroyPurchase($order = Criteria::ASC) Order by the destroy_purchase column
 * @method     ChildRolePermissionQuery orderByCreateSales($order = Criteria::ASC) Order by the create_sales column
 * @method     ChildRolePermissionQuery orderByReadSales($order = Criteria::ASC) Order by the read_sales column
 * @method     ChildRolePermissionQuery orderByUpdateSales($order = Criteria::ASC) Order by the update_sales column
 * @method     ChildRolePermissionQuery orderByDestroySales($order = Criteria::ASC) Order by the destroy_sales column
 * @method     ChildRolePermissionQuery orderByCreateStock($order = Criteria::ASC) Order by the create_stock column
 * @method     ChildRolePermissionQuery orderByReadStock($order = Criteria::ASC) Order by the read_stock column
 * @method     ChildRolePermissionQuery orderByUpdateStock($order = Criteria::ASC) Order by the update_stock column
 * @method     ChildRolePermissionQuery orderByDestroyStock($order = Criteria::ASC) Order by the destroy_stock column
 * @method     ChildRolePermissionQuery orderByCreateSupplier($order = Criteria::ASC) Order by the create_supplier column
 * @method     ChildRolePermissionQuery orderByReadSupplier($order = Criteria::ASC) Order by the read_supplier column
 * @method     ChildRolePermissionQuery orderByUpdateSupplier($order = Criteria::ASC) Order by the update_supplier column
 * @method     ChildRolePermissionQuery orderByDestroySupplier($order = Criteria::ASC) Order by the destroy_supplier column
 * @method     ChildRolePermissionQuery orderByCreateUnit($order = Criteria::ASC) Order by the create_unit column
 * @method     ChildRolePermissionQuery orderByReadUnit($order = Criteria::ASC) Order by the read_unit column
 * @method     ChildRolePermissionQuery orderByUpdateUnit($order = Criteria::ASC) Order by the update_unit column
 * @method     ChildRolePermissionQuery orderByDestroyUnit($order = Criteria::ASC) Order by the destroy_unit column
 * @method     ChildRolePermissionQuery orderByCreateUser($order = Criteria::ASC) Order by the create_user column
 * @method     ChildRolePermissionQuery orderByReadUser($order = Criteria::ASC) Order by the read_user column
 * @method     ChildRolePermissionQuery orderByUpdateUser($order = Criteria::ASC) Order by the update_user column
 * @method     ChildRolePermissionQuery orderByDestroyUser($order = Criteria::ASC) Order by the destroy_user column
 * @method     ChildRolePermissionQuery orderByResetPassUser($order = Criteria::ASC) Order by the reset_pass_user column
 * @method     ChildRolePermissionQuery orderByPayCredit($order = Criteria::ASC) Order by the pay_credit column
 * @method     ChildRolePermissionQuery orderByReadCredit($order = Criteria::ASC) Order by the read_credit column
 *
 * @method     ChildRolePermissionQuery groupById() Group by the id column
 * @method     ChildRolePermissionQuery groupByCreateCustomer() Group by the create_customer column
 * @method     ChildRolePermissionQuery groupByReadCustomer() Group by the read_customer column
 * @method     ChildRolePermissionQuery groupByUpdateCustomer() Group by the update_customer column
 * @method     ChildRolePermissionQuery groupByDestroyCustomer() Group by the destroy_customer column
 * @method     ChildRolePermissionQuery groupByCreateProduct() Group by the create_product column
 * @method     ChildRolePermissionQuery groupByReadProduct() Group by the read_product column
 * @method     ChildRolePermissionQuery groupByUpdateProduct() Group by the update_product column
 * @method     ChildRolePermissionQuery groupByDestroyProduct() Group by the destroy_product column
 * @method     ChildRolePermissionQuery groupByCreatePurchase() Group by the create_purchase column
 * @method     ChildRolePermissionQuery groupByReadPurchase() Group by the read_purchase column
 * @method     ChildRolePermissionQuery groupByUpdatePurchase() Group by the update_purchase column
 * @method     ChildRolePermissionQuery groupByDestroyPurchase() Group by the destroy_purchase column
 * @method     ChildRolePermissionQuery groupByCreateSales() Group by the create_sales column
 * @method     ChildRolePermissionQuery groupByReadSales() Group by the read_sales column
 * @method     ChildRolePermissionQuery groupByUpdateSales() Group by the update_sales column
 * @method     ChildRolePermissionQuery groupByDestroySales() Group by the destroy_sales column
 * @method     ChildRolePermissionQuery groupByCreateStock() Group by the create_stock column
 * @method     ChildRolePermissionQuery groupByReadStock() Group by the read_stock column
 * @method     ChildRolePermissionQuery groupByUpdateStock() Group by the update_stock column
 * @method     ChildRolePermissionQuery groupByDestroyStock() Group by the destroy_stock column
 * @method     ChildRolePermissionQuery groupByCreateSupplier() Group by the create_supplier column
 * @method     ChildRolePermissionQuery groupByReadSupplier() Group by the read_supplier column
 * @method     ChildRolePermissionQuery groupByUpdateSupplier() Group by the update_supplier column
 * @method     ChildRolePermissionQuery groupByDestroySupplier() Group by the destroy_supplier column
 * @method     ChildRolePermissionQuery groupByCreateUnit() Group by the create_unit column
 * @method     ChildRolePermissionQuery groupByReadUnit() Group by the read_unit column
 * @method     ChildRolePermissionQuery groupByUpdateUnit() Group by the update_unit column
 * @method     ChildRolePermissionQuery groupByDestroyUnit() Group by the destroy_unit column
 * @method     ChildRolePermissionQuery groupByCreateUser() Group by the create_user column
 * @method     ChildRolePermissionQuery groupByReadUser() Group by the read_user column
 * @method     ChildRolePermissionQuery groupByUpdateUser() Group by the update_user column
 * @method     ChildRolePermissionQuery groupByDestroyUser() Group by the destroy_user column
 * @method     ChildRolePermissionQuery groupByResetPassUser() Group by the reset_pass_user column
 * @method     ChildRolePermissionQuery groupByPayCredit() Group by the pay_credit column
 * @method     ChildRolePermissionQuery groupByReadCredit() Group by the read_credit column
 *
 * @method     ChildRolePermissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRolePermissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRolePermissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRolePermissionQuery leftJoinRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the Role relation
 * @method     ChildRolePermissionQuery rightJoinRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Role relation
 * @method     ChildRolePermissionQuery innerJoinRole($relationAlias = null) Adds a INNER JOIN clause to the query using the Role relation
 *
 * @method     \ORM\RoleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRolePermission findOne(ConnectionInterface $con = null) Return the first ChildRolePermission matching the query
 * @method     ChildRolePermission findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRolePermission matching the query, or a new ChildRolePermission object populated from the query conditions when no match is found
 *
 * @method     ChildRolePermission findOneById(string $id) Return the first ChildRolePermission filtered by the id column
 * @method     ChildRolePermission findOneByCreateCustomer(boolean $create_customer) Return the first ChildRolePermission filtered by the create_customer column
 * @method     ChildRolePermission findOneByReadCustomer(boolean $read_customer) Return the first ChildRolePermission filtered by the read_customer column
 * @method     ChildRolePermission findOneByUpdateCustomer(boolean $update_customer) Return the first ChildRolePermission filtered by the update_customer column
 * @method     ChildRolePermission findOneByDestroyCustomer(boolean $destroy_customer) Return the first ChildRolePermission filtered by the destroy_customer column
 * @method     ChildRolePermission findOneByCreateProduct(boolean $create_product) Return the first ChildRolePermission filtered by the create_product column
 * @method     ChildRolePermission findOneByReadProduct(boolean $read_product) Return the first ChildRolePermission filtered by the read_product column
 * @method     ChildRolePermission findOneByUpdateProduct(boolean $update_product) Return the first ChildRolePermission filtered by the update_product column
 * @method     ChildRolePermission findOneByDestroyProduct(boolean $destroy_product) Return the first ChildRolePermission filtered by the destroy_product column
 * @method     ChildRolePermission findOneByCreatePurchase(boolean $create_purchase) Return the first ChildRolePermission filtered by the create_purchase column
 * @method     ChildRolePermission findOneByReadPurchase(boolean $read_purchase) Return the first ChildRolePermission filtered by the read_purchase column
 * @method     ChildRolePermission findOneByUpdatePurchase(boolean $update_purchase) Return the first ChildRolePermission filtered by the update_purchase column
 * @method     ChildRolePermission findOneByDestroyPurchase(boolean $destroy_purchase) Return the first ChildRolePermission filtered by the destroy_purchase column
 * @method     ChildRolePermission findOneByCreateSales(boolean $create_sales) Return the first ChildRolePermission filtered by the create_sales column
 * @method     ChildRolePermission findOneByReadSales(boolean $read_sales) Return the first ChildRolePermission filtered by the read_sales column
 * @method     ChildRolePermission findOneByUpdateSales(boolean $update_sales) Return the first ChildRolePermission filtered by the update_sales column
 * @method     ChildRolePermission findOneByDestroySales(boolean $destroy_sales) Return the first ChildRolePermission filtered by the destroy_sales column
 * @method     ChildRolePermission findOneByCreateStock(boolean $create_stock) Return the first ChildRolePermission filtered by the create_stock column
 * @method     ChildRolePermission findOneByReadStock(boolean $read_stock) Return the first ChildRolePermission filtered by the read_stock column
 * @method     ChildRolePermission findOneByUpdateStock(boolean $update_stock) Return the first ChildRolePermission filtered by the update_stock column
 * @method     ChildRolePermission findOneByDestroyStock(boolean $destroy_stock) Return the first ChildRolePermission filtered by the destroy_stock column
 * @method     ChildRolePermission findOneByCreateSupplier(boolean $create_supplier) Return the first ChildRolePermission filtered by the create_supplier column
 * @method     ChildRolePermission findOneByReadSupplier(boolean $read_supplier) Return the first ChildRolePermission filtered by the read_supplier column
 * @method     ChildRolePermission findOneByUpdateSupplier(boolean $update_supplier) Return the first ChildRolePermission filtered by the update_supplier column
 * @method     ChildRolePermission findOneByDestroySupplier(boolean $destroy_supplier) Return the first ChildRolePermission filtered by the destroy_supplier column
 * @method     ChildRolePermission findOneByCreateUnit(boolean $create_unit) Return the first ChildRolePermission filtered by the create_unit column
 * @method     ChildRolePermission findOneByReadUnit(boolean $read_unit) Return the first ChildRolePermission filtered by the read_unit column
 * @method     ChildRolePermission findOneByUpdateUnit(boolean $update_unit) Return the first ChildRolePermission filtered by the update_unit column
 * @method     ChildRolePermission findOneByDestroyUnit(boolean $destroy_unit) Return the first ChildRolePermission filtered by the destroy_unit column
 * @method     ChildRolePermission findOneByCreateUser(boolean $create_user) Return the first ChildRolePermission filtered by the create_user column
 * @method     ChildRolePermission findOneByReadUser(boolean $read_user) Return the first ChildRolePermission filtered by the read_user column
 * @method     ChildRolePermission findOneByUpdateUser(boolean $update_user) Return the first ChildRolePermission filtered by the update_user column
 * @method     ChildRolePermission findOneByDestroyUser(boolean $destroy_user) Return the first ChildRolePermission filtered by the destroy_user column
 * @method     ChildRolePermission findOneByResetPassUser(boolean $reset_pass_user) Return the first ChildRolePermission filtered by the reset_pass_user column
 * @method     ChildRolePermission findOneByPayCredit(boolean $pay_credit) Return the first ChildRolePermission filtered by the pay_credit column
 * @method     ChildRolePermission findOneByReadCredit(boolean $read_credit) Return the first ChildRolePermission filtered by the read_credit column
 *
 * @method     ChildRolePermission[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRolePermission objects based on current ModelCriteria
 * @method     ChildRolePermission[]|ObjectCollection findById(string $id) Return ChildRolePermission objects filtered by the id column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateCustomer(boolean $create_customer) Return ChildRolePermission objects filtered by the create_customer column
 * @method     ChildRolePermission[]|ObjectCollection findByReadCustomer(boolean $read_customer) Return ChildRolePermission objects filtered by the read_customer column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateCustomer(boolean $update_customer) Return ChildRolePermission objects filtered by the update_customer column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyCustomer(boolean $destroy_customer) Return ChildRolePermission objects filtered by the destroy_customer column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateProduct(boolean $create_product) Return ChildRolePermission objects filtered by the create_product column
 * @method     ChildRolePermission[]|ObjectCollection findByReadProduct(boolean $read_product) Return ChildRolePermission objects filtered by the read_product column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateProduct(boolean $update_product) Return ChildRolePermission objects filtered by the update_product column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyProduct(boolean $destroy_product) Return ChildRolePermission objects filtered by the destroy_product column
 * @method     ChildRolePermission[]|ObjectCollection findByCreatePurchase(boolean $create_purchase) Return ChildRolePermission objects filtered by the create_purchase column
 * @method     ChildRolePermission[]|ObjectCollection findByReadPurchase(boolean $read_purchase) Return ChildRolePermission objects filtered by the read_purchase column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdatePurchase(boolean $update_purchase) Return ChildRolePermission objects filtered by the update_purchase column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyPurchase(boolean $destroy_purchase) Return ChildRolePermission objects filtered by the destroy_purchase column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateSales(boolean $create_sales) Return ChildRolePermission objects filtered by the create_sales column
 * @method     ChildRolePermission[]|ObjectCollection findByReadSales(boolean $read_sales) Return ChildRolePermission objects filtered by the read_sales column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateSales(boolean $update_sales) Return ChildRolePermission objects filtered by the update_sales column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroySales(boolean $destroy_sales) Return ChildRolePermission objects filtered by the destroy_sales column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateStock(boolean $create_stock) Return ChildRolePermission objects filtered by the create_stock column
 * @method     ChildRolePermission[]|ObjectCollection findByReadStock(boolean $read_stock) Return ChildRolePermission objects filtered by the read_stock column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateStock(boolean $update_stock) Return ChildRolePermission objects filtered by the update_stock column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyStock(boolean $destroy_stock) Return ChildRolePermission objects filtered by the destroy_stock column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateSupplier(boolean $create_supplier) Return ChildRolePermission objects filtered by the create_supplier column
 * @method     ChildRolePermission[]|ObjectCollection findByReadSupplier(boolean $read_supplier) Return ChildRolePermission objects filtered by the read_supplier column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateSupplier(boolean $update_supplier) Return ChildRolePermission objects filtered by the update_supplier column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroySupplier(boolean $destroy_supplier) Return ChildRolePermission objects filtered by the destroy_supplier column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateUnit(boolean $create_unit) Return ChildRolePermission objects filtered by the create_unit column
 * @method     ChildRolePermission[]|ObjectCollection findByReadUnit(boolean $read_unit) Return ChildRolePermission objects filtered by the read_unit column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateUnit(boolean $update_unit) Return ChildRolePermission objects filtered by the update_unit column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyUnit(boolean $destroy_unit) Return ChildRolePermission objects filtered by the destroy_unit column
 * @method     ChildRolePermission[]|ObjectCollection findByCreateUser(boolean $create_user) Return ChildRolePermission objects filtered by the create_user column
 * @method     ChildRolePermission[]|ObjectCollection findByReadUser(boolean $read_user) Return ChildRolePermission objects filtered by the read_user column
 * @method     ChildRolePermission[]|ObjectCollection findByUpdateUser(boolean $update_user) Return ChildRolePermission objects filtered by the update_user column
 * @method     ChildRolePermission[]|ObjectCollection findByDestroyUser(boolean $destroy_user) Return ChildRolePermission objects filtered by the destroy_user column
 * @method     ChildRolePermission[]|ObjectCollection findByResetPassUser(boolean $reset_pass_user) Return ChildRolePermission objects filtered by the reset_pass_user column
 * @method     ChildRolePermission[]|ObjectCollection findByPayCredit(boolean $pay_credit) Return ChildRolePermission objects filtered by the pay_credit column
 * @method     ChildRolePermission[]|ObjectCollection findByReadCredit(boolean $read_credit) Return ChildRolePermission objects filtered by the read_credit column
 * @method     ChildRolePermission[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RolePermissionQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \ORM\Base\RolePermissionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pos', $modelName = '\\ORM\\RolePermission', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRolePermissionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRolePermissionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRolePermissionQuery) {
            return $criteria;
        }
        $query = new ChildRolePermissionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRolePermission|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RolePermissionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RolePermissionTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildRolePermission A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, CREATE_CUSTOMER, READ_CUSTOMER, UPDATE_CUSTOMER, DESTROY_CUSTOMER, CREATE_PRODUCT, READ_PRODUCT, UPDATE_PRODUCT, DESTROY_PRODUCT, CREATE_PURCHASE, READ_PURCHASE, UPDATE_PURCHASE, DESTROY_PURCHASE, CREATE_SALES, READ_SALES, UPDATE_SALES, DESTROY_SALES, CREATE_STOCK, READ_STOCK, UPDATE_STOCK, DESTROY_STOCK, CREATE_SUPPLIER, READ_SUPPLIER, UPDATE_SUPPLIER, DESTROY_SUPPLIER, CREATE_UNIT, READ_UNIT, UPDATE_UNIT, DESTROY_UNIT, CREATE_USER, READ_USER, UPDATE_USER, DESTROY_USER, RESET_PASS_USER, PAY_CREDIT, READ_CREDIT FROM role_permission WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildRolePermission $obj */
            $obj = new ChildRolePermission();
            $obj->hydrate($row);
            RolePermissionTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildRolePermission|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RolePermissionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RolePermissionTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @see       filterByRole()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RolePermissionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RolePermissionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the create_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateCustomer(true); // WHERE create_customer = true
     * $query->filterByCreateCustomer('yes'); // WHERE create_customer = true
     * </code>
     *
     * @param     boolean|string $createCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateCustomer($createCustomer = null, $comparison = null)
    {
        if (is_string($createCustomer)) {
            $createCustomer = in_array(strtolower($createCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_CUSTOMER, $createCustomer, $comparison);
    }

    /**
     * Filter the query on the read_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByReadCustomer(true); // WHERE read_customer = true
     * $query->filterByReadCustomer('yes'); // WHERE read_customer = true
     * </code>
     *
     * @param     boolean|string $readCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadCustomer($readCustomer = null, $comparison = null)
    {
        if (is_string($readCustomer)) {
            $readCustomer = in_array(strtolower($readCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_CUSTOMER, $readCustomer, $comparison);
    }

    /**
     * Filter the query on the update_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateCustomer(true); // WHERE update_customer = true
     * $query->filterByUpdateCustomer('yes'); // WHERE update_customer = true
     * </code>
     *
     * @param     boolean|string $updateCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateCustomer($updateCustomer = null, $comparison = null)
    {
        if (is_string($updateCustomer)) {
            $updateCustomer = in_array(strtolower($updateCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_CUSTOMER, $updateCustomer, $comparison);
    }

    /**
     * Filter the query on the destroy_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyCustomer(true); // WHERE destroy_customer = true
     * $query->filterByDestroyCustomer('yes'); // WHERE destroy_customer = true
     * </code>
     *
     * @param     boolean|string $destroyCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyCustomer($destroyCustomer = null, $comparison = null)
    {
        if (is_string($destroyCustomer)) {
            $destroyCustomer = in_array(strtolower($destroyCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_CUSTOMER, $destroyCustomer, $comparison);
    }

    /**
     * Filter the query on the create_product column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateProduct(true); // WHERE create_product = true
     * $query->filterByCreateProduct('yes'); // WHERE create_product = true
     * </code>
     *
     * @param     boolean|string $createProduct The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateProduct($createProduct = null, $comparison = null)
    {
        if (is_string($createProduct)) {
            $createProduct = in_array(strtolower($createProduct), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_PRODUCT, $createProduct, $comparison);
    }

    /**
     * Filter the query on the read_product column
     *
     * Example usage:
     * <code>
     * $query->filterByReadProduct(true); // WHERE read_product = true
     * $query->filterByReadProduct('yes'); // WHERE read_product = true
     * </code>
     *
     * @param     boolean|string $readProduct The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadProduct($readProduct = null, $comparison = null)
    {
        if (is_string($readProduct)) {
            $readProduct = in_array(strtolower($readProduct), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_PRODUCT, $readProduct, $comparison);
    }

    /**
     * Filter the query on the update_product column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateProduct(true); // WHERE update_product = true
     * $query->filterByUpdateProduct('yes'); // WHERE update_product = true
     * </code>
     *
     * @param     boolean|string $updateProduct The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateProduct($updateProduct = null, $comparison = null)
    {
        if (is_string($updateProduct)) {
            $updateProduct = in_array(strtolower($updateProduct), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_PRODUCT, $updateProduct, $comparison);
    }

    /**
     * Filter the query on the destroy_product column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyProduct(true); // WHERE destroy_product = true
     * $query->filterByDestroyProduct('yes'); // WHERE destroy_product = true
     * </code>
     *
     * @param     boolean|string $destroyProduct The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyProduct($destroyProduct = null, $comparison = null)
    {
        if (is_string($destroyProduct)) {
            $destroyProduct = in_array(strtolower($destroyProduct), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_PRODUCT, $destroyProduct, $comparison);
    }

    /**
     * Filter the query on the create_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatePurchase(true); // WHERE create_purchase = true
     * $query->filterByCreatePurchase('yes'); // WHERE create_purchase = true
     * </code>
     *
     * @param     boolean|string $createPurchase The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreatePurchase($createPurchase = null, $comparison = null)
    {
        if (is_string($createPurchase)) {
            $createPurchase = in_array(strtolower($createPurchase), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_PURCHASE, $createPurchase, $comparison);
    }

    /**
     * Filter the query on the read_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByReadPurchase(true); // WHERE read_purchase = true
     * $query->filterByReadPurchase('yes'); // WHERE read_purchase = true
     * </code>
     *
     * @param     boolean|string $readPurchase The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadPurchase($readPurchase = null, $comparison = null)
    {
        if (is_string($readPurchase)) {
            $readPurchase = in_array(strtolower($readPurchase), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_PURCHASE, $readPurchase, $comparison);
    }

    /**
     * Filter the query on the update_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatePurchase(true); // WHERE update_purchase = true
     * $query->filterByUpdatePurchase('yes'); // WHERE update_purchase = true
     * </code>
     *
     * @param     boolean|string $updatePurchase The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdatePurchase($updatePurchase = null, $comparison = null)
    {
        if (is_string($updatePurchase)) {
            $updatePurchase = in_array(strtolower($updatePurchase), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_PURCHASE, $updatePurchase, $comparison);
    }

    /**
     * Filter the query on the destroy_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyPurchase(true); // WHERE destroy_purchase = true
     * $query->filterByDestroyPurchase('yes'); // WHERE destroy_purchase = true
     * </code>
     *
     * @param     boolean|string $destroyPurchase The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyPurchase($destroyPurchase = null, $comparison = null)
    {
        if (is_string($destroyPurchase)) {
            $destroyPurchase = in_array(strtolower($destroyPurchase), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_PURCHASE, $destroyPurchase, $comparison);
    }

    /**
     * Filter the query on the create_sales column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateSales(true); // WHERE create_sales = true
     * $query->filterByCreateSales('yes'); // WHERE create_sales = true
     * </code>
     *
     * @param     boolean|string $createSales The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateSales($createSales = null, $comparison = null)
    {
        if (is_string($createSales)) {
            $createSales = in_array(strtolower($createSales), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_SALES, $createSales, $comparison);
    }

    /**
     * Filter the query on the read_sales column
     *
     * Example usage:
     * <code>
     * $query->filterByReadSales(true); // WHERE read_sales = true
     * $query->filterByReadSales('yes'); // WHERE read_sales = true
     * </code>
     *
     * @param     boolean|string $readSales The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadSales($readSales = null, $comparison = null)
    {
        if (is_string($readSales)) {
            $readSales = in_array(strtolower($readSales), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_SALES, $readSales, $comparison);
    }

    /**
     * Filter the query on the update_sales column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateSales(true); // WHERE update_sales = true
     * $query->filterByUpdateSales('yes'); // WHERE update_sales = true
     * </code>
     *
     * @param     boolean|string $updateSales The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateSales($updateSales = null, $comparison = null)
    {
        if (is_string($updateSales)) {
            $updateSales = in_array(strtolower($updateSales), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_SALES, $updateSales, $comparison);
    }

    /**
     * Filter the query on the destroy_sales column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroySales(true); // WHERE destroy_sales = true
     * $query->filterByDestroySales('yes'); // WHERE destroy_sales = true
     * </code>
     *
     * @param     boolean|string $destroySales The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroySales($destroySales = null, $comparison = null)
    {
        if (is_string($destroySales)) {
            $destroySales = in_array(strtolower($destroySales), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_SALES, $destroySales, $comparison);
    }

    /**
     * Filter the query on the create_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateStock(true); // WHERE create_stock = true
     * $query->filterByCreateStock('yes'); // WHERE create_stock = true
     * </code>
     *
     * @param     boolean|string $createStock The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateStock($createStock = null, $comparison = null)
    {
        if (is_string($createStock)) {
            $createStock = in_array(strtolower($createStock), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_STOCK, $createStock, $comparison);
    }

    /**
     * Filter the query on the read_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByReadStock(true); // WHERE read_stock = true
     * $query->filterByReadStock('yes'); // WHERE read_stock = true
     * </code>
     *
     * @param     boolean|string $readStock The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadStock($readStock = null, $comparison = null)
    {
        if (is_string($readStock)) {
            $readStock = in_array(strtolower($readStock), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_STOCK, $readStock, $comparison);
    }

    /**
     * Filter the query on the update_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateStock(true); // WHERE update_stock = true
     * $query->filterByUpdateStock('yes'); // WHERE update_stock = true
     * </code>
     *
     * @param     boolean|string $updateStock The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateStock($updateStock = null, $comparison = null)
    {
        if (is_string($updateStock)) {
            $updateStock = in_array(strtolower($updateStock), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_STOCK, $updateStock, $comparison);
    }

    /**
     * Filter the query on the destroy_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyStock(true); // WHERE destroy_stock = true
     * $query->filterByDestroyStock('yes'); // WHERE destroy_stock = true
     * </code>
     *
     * @param     boolean|string $destroyStock The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyStock($destroyStock = null, $comparison = null)
    {
        if (is_string($destroyStock)) {
            $destroyStock = in_array(strtolower($destroyStock), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_STOCK, $destroyStock, $comparison);
    }

    /**
     * Filter the query on the create_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateSupplier(true); // WHERE create_supplier = true
     * $query->filterByCreateSupplier('yes'); // WHERE create_supplier = true
     * </code>
     *
     * @param     boolean|string $createSupplier The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateSupplier($createSupplier = null, $comparison = null)
    {
        if (is_string($createSupplier)) {
            $createSupplier = in_array(strtolower($createSupplier), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_SUPPLIER, $createSupplier, $comparison);
    }

    /**
     * Filter the query on the read_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByReadSupplier(true); // WHERE read_supplier = true
     * $query->filterByReadSupplier('yes'); // WHERE read_supplier = true
     * </code>
     *
     * @param     boolean|string $readSupplier The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadSupplier($readSupplier = null, $comparison = null)
    {
        if (is_string($readSupplier)) {
            $readSupplier = in_array(strtolower($readSupplier), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_SUPPLIER, $readSupplier, $comparison);
    }

    /**
     * Filter the query on the update_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateSupplier(true); // WHERE update_supplier = true
     * $query->filterByUpdateSupplier('yes'); // WHERE update_supplier = true
     * </code>
     *
     * @param     boolean|string $updateSupplier The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateSupplier($updateSupplier = null, $comparison = null)
    {
        if (is_string($updateSupplier)) {
            $updateSupplier = in_array(strtolower($updateSupplier), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_SUPPLIER, $updateSupplier, $comparison);
    }

    /**
     * Filter the query on the destroy_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroySupplier(true); // WHERE destroy_supplier = true
     * $query->filterByDestroySupplier('yes'); // WHERE destroy_supplier = true
     * </code>
     *
     * @param     boolean|string $destroySupplier The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroySupplier($destroySupplier = null, $comparison = null)
    {
        if (is_string($destroySupplier)) {
            $destroySupplier = in_array(strtolower($destroySupplier), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_SUPPLIER, $destroySupplier, $comparison);
    }

    /**
     * Filter the query on the create_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateUnit(true); // WHERE create_unit = true
     * $query->filterByCreateUnit('yes'); // WHERE create_unit = true
     * </code>
     *
     * @param     boolean|string $createUnit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateUnit($createUnit = null, $comparison = null)
    {
        if (is_string($createUnit)) {
            $createUnit = in_array(strtolower($createUnit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_UNIT, $createUnit, $comparison);
    }

    /**
     * Filter the query on the read_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByReadUnit(true); // WHERE read_unit = true
     * $query->filterByReadUnit('yes'); // WHERE read_unit = true
     * </code>
     *
     * @param     boolean|string $readUnit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadUnit($readUnit = null, $comparison = null)
    {
        if (is_string($readUnit)) {
            $readUnit = in_array(strtolower($readUnit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_UNIT, $readUnit, $comparison);
    }

    /**
     * Filter the query on the update_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateUnit(true); // WHERE update_unit = true
     * $query->filterByUpdateUnit('yes'); // WHERE update_unit = true
     * </code>
     *
     * @param     boolean|string $updateUnit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateUnit($updateUnit = null, $comparison = null)
    {
        if (is_string($updateUnit)) {
            $updateUnit = in_array(strtolower($updateUnit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_UNIT, $updateUnit, $comparison);
    }

    /**
     * Filter the query on the destroy_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyUnit(true); // WHERE destroy_unit = true
     * $query->filterByDestroyUnit('yes'); // WHERE destroy_unit = true
     * </code>
     *
     * @param     boolean|string $destroyUnit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyUnit($destroyUnit = null, $comparison = null)
    {
        if (is_string($destroyUnit)) {
            $destroyUnit = in_array(strtolower($destroyUnit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_UNIT, $destroyUnit, $comparison);
    }

    /**
     * Filter the query on the create_user column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateUser(true); // WHERE create_user = true
     * $query->filterByCreateUser('yes'); // WHERE create_user = true
     * </code>
     *
     * @param     boolean|string $createUser The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByCreateUser($createUser = null, $comparison = null)
    {
        if (is_string($createUser)) {
            $createUser = in_array(strtolower($createUser), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_CREATE_USER, $createUser, $comparison);
    }

    /**
     * Filter the query on the read_user column
     *
     * Example usage:
     * <code>
     * $query->filterByReadUser(true); // WHERE read_user = true
     * $query->filterByReadUser('yes'); // WHERE read_user = true
     * </code>
     *
     * @param     boolean|string $readUser The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadUser($readUser = null, $comparison = null)
    {
        if (is_string($readUser)) {
            $readUser = in_array(strtolower($readUser), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_USER, $readUser, $comparison);
    }

    /**
     * Filter the query on the update_user column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateUser(true); // WHERE update_user = true
     * $query->filterByUpdateUser('yes'); // WHERE update_user = true
     * </code>
     *
     * @param     boolean|string $updateUser The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByUpdateUser($updateUser = null, $comparison = null)
    {
        if (is_string($updateUser)) {
            $updateUser = in_array(strtolower($updateUser), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_UPDATE_USER, $updateUser, $comparison);
    }

    /**
     * Filter the query on the destroy_user column
     *
     * Example usage:
     * <code>
     * $query->filterByDestroyUser(true); // WHERE destroy_user = true
     * $query->filterByDestroyUser('yes'); // WHERE destroy_user = true
     * </code>
     *
     * @param     boolean|string $destroyUser The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByDestroyUser($destroyUser = null, $comparison = null)
    {
        if (is_string($destroyUser)) {
            $destroyUser = in_array(strtolower($destroyUser), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_DESTROY_USER, $destroyUser, $comparison);
    }

    /**
     * Filter the query on the reset_pass_user column
     *
     * Example usage:
     * <code>
     * $query->filterByResetPassUser(true); // WHERE reset_pass_user = true
     * $query->filterByResetPassUser('yes'); // WHERE reset_pass_user = true
     * </code>
     *
     * @param     boolean|string $resetPassUser The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByResetPassUser($resetPassUser = null, $comparison = null)
    {
        if (is_string($resetPassUser)) {
            $resetPassUser = in_array(strtolower($resetPassUser), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_RESET_PASS_USER, $resetPassUser, $comparison);
    }

    /**
     * Filter the query on the pay_credit column
     *
     * Example usage:
     * <code>
     * $query->filterByPayCredit(true); // WHERE pay_credit = true
     * $query->filterByPayCredit('yes'); // WHERE pay_credit = true
     * </code>
     *
     * @param     boolean|string $payCredit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByPayCredit($payCredit = null, $comparison = null)
    {
        if (is_string($payCredit)) {
            $payCredit = in_array(strtolower($payCredit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_PAY_CREDIT, $payCredit, $comparison);
    }

    /**
     * Filter the query on the read_credit column
     *
     * Example usage:
     * <code>
     * $query->filterByReadCredit(true); // WHERE read_credit = true
     * $query->filterByReadCredit('yes'); // WHERE read_credit = true
     * </code>
     *
     * @param     boolean|string $readCredit The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByReadCredit($readCredit = null, $comparison = null)
    {
        if (is_string($readCredit)) {
            $readCredit = in_array(strtolower($readCredit), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RolePermissionTableMap::COL_READ_CREDIT, $readCredit, $comparison);
    }

    /**
     * Filter the query by a related \ORM\Role object
     *
     * @param \ORM\Role|ObjectCollection $role The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRolePermissionQuery The current query, for fluid interface
     */
    public function filterByRole($role, $comparison = null)
    {
        if ($role instanceof \ORM\Role) {
            return $this
                ->addUsingAlias(RolePermissionTableMap::COL_ID, $role->getId(), $comparison);
        } elseif ($role instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RolePermissionTableMap::COL_ID, $role->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRole() only accepts arguments of type \ORM\Role or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Role relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function joinRole($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Role');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Role');
        }

        return $this;
    }

    /**
     * Use the Role relation Role object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\RoleQuery A secondary query class using the current class as primary query
     */
    public function useRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Role', '\ORM\RoleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRolePermission $rolePermission Object to remove from the list of results
     *
     * @return $this|ChildRolePermissionQuery The current query, for fluid interface
     */
    public function prune($rolePermission = null)
    {
        if ($rolePermission) {
            $this->addUsingAlias(RolePermissionTableMap::COL_ID, $rolePermission->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the role_permission table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RolePermissionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RolePermissionTableMap::clearInstancePool();
            RolePermissionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RolePermissionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RolePermissionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RolePermissionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RolePermissionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RolePermissionQuery
