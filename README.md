
# Project Documentation

## Front-end

### Technology Stack:
- **React.js**

### Setup Instructions:

1. **Install Dependencies**:  
   Run the following command to install all required dependencies:
   ```bash
   npm install
   ```

2. **Set Environment Variables**:  
   Create a `.env` file based on the provided `.env.example`. Ensure the necessary API endpoints and keys are configured.

3. **Start the Application**:  
   Run the command below to start the front-end server:
   ```bash
   npm run start
   ```

### Navigation Overview:
- **Master Data**:
  - **Users**
  - **Employee**
  
- **Approval**:
  - **Transaction**
  - **Workflow**
  - **Need Approval**

---

## Back-end

### Technology Stack:
- **Laravel** (PHP Framework)
- **MySQL** (Database)

### Setup Instructions:

1. **Install Dependencies**:  
   Run the following command to install all Laravel dependencies:
   ```bash
   composer install
   ```

2. **Set Environment Variables**:  
   - Create a `.env` file for the Laravel backend based on `.env.example`. Ensure database credentials and other environment variables are set.
   - Additionally, set up environment variables for the **Authentication Service** located at `microservices/Dolphin/bin/.env`.

3. **Run Dolphin Authentication Service**:  
   Depending on your OS, run the appropriate command to start the Dolphin microservice for authentication:
   ```bash
   # Linux
   microservices/Dolphin/bin/dolphin-linux

   # macOS
   microservices/Dolphin/bin/dolphin-mac

   # Windows
   microservices/Dolphin/bin/dolphin-windows.exe
   ```

4. **Start the Laravel Server**:  
   Run the following command to start the Laravel development server:
   ```bash
   php artisan serve
   ```

### API Documentation:
The API documentation is available at:  
[http://127.0.0.1:8000/api/documentation](http://127.0.0.1:8000/api/documentation)

---

## Stored Procedure

### **InsertNeedApproval Procedure**

This procedure is used for handling approvals based on various workflow types and conditions.

```sql
DROP PROCEDURE IF EXISTS InsertNeedApproval;

CREATE PROCEDURE InsertNeedApproval(
    IN Modul_Id INT,
    IN Transaction_Id INT,
    IN Total_Amount DECIMAL(15, 2),
    IN Request_NIK VARCHAR(50)
)
BEGIN
    DECLARE WorkflowType VARCHAR(50);
    DECLARE ApproverNIK VARCHAR(50);
    DECLARE ApproverName VARCHAR(100);
    DECLARE ApproverEmail VARCHAR(100);
    DECLARE ApproverPosition VARCHAR(100);
    DECLARE Value DECIMAL(15, 2);

    -- Select WorkflowType with explicit collation to avoid collation issues
    SELECT type COLLATE utf8mb4_unicode_ci, value, nik, name, email, position 
    INTO WorkflowType, Value, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition
    FROM workflow_approvals
    WHERE id = Modul_Id;

    -- Logic for inserting approval data based on WorkflowType
    IF WorkflowType = 'Custom' THEN
        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);

    ELSEIF WorkflowType = 'HRIS' THEN
        -- Select Employee data from the employees table
        SELECT nik COLLATE utf8mb4_unicode_ci, name, email, position 
        INTO ApproverNIK, ApproverName, ApproverEmail, ApproverPosition
        FROM employees
        WHERE nik COLLATE utf8mb4_unicode_ci = Request_NIK COLLATE utf8mb4_unicode_ci;

        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);

    ELSEIF WorkflowType = 'Total Amount >=' AND Total_Amount >= Value THEN
        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);

    ELSEIF WorkflowType = 'Total Amount >' AND Total_Amount > Value THEN
        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);

    ELSEIF WorkflowType = 'Total Amount <=' AND Total_Amount <= Value THEN
        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);

    ELSEIF WorkflowType = 'Total Amount <' AND Total_Amount < Value THEN
        INSERT INTO need_approvals (modul_id, transaction_id, nik, name, email, position, level)
        VALUES (Modul_Id, Transaction_Id, ApproverNIK, ApproverName, ApproverEmail, ApproverPosition, 1);
    END IF;

    -- Add other conditions as needed for further logic
END;
```
