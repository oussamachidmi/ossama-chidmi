const { Sequelize, DataTypes } = require('sequelize');

async function connectToDB() {
  const sequelize = new Sequelize('postgres', process.env.USERNAME, process.env.PASSWORD, {
    host: process.env.PGHOST,
    port: 5432,
    dialect: 'postgres'
  });

  const User = sequelize.define('epitinder_users', {
    name: {
      type: DataTypes.STRING,
      allowNull: false
    },
    age: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    description: {
      type: DataTypes.STRING,
      allowNull: false
    }
  }, {
    timestamps: false
  });

  await sequelize.authenticate();
  console.log('Connection has been established successfully.');

  return { sequelize, User };
}

async function getAllUsers() {
  const { sequelize, User } = await connectToDB();
  const users = await User.findAll();
  await sequelize.close();

  return users.map(user => ({
    id: user.id,
    name: user.name,
    age: user.age,
    description: user.description
  }));
}

async function getUser(id) {
  const { sequelize, User } = await connectToDB();
  const user = await User.findByPk(id);
  await sequelize.close();

  if (user === null) {
    return null;
  }

  return {
    id: user.id,
    name: user.name,
    age: user.age,
    description: user.description
  };
}

async function addUser(newUser) {
  const { sequelize, User } = await connectToDB();

  try {
    const user = await User.create(newUser);
    await sequelize.close();

    return {
      id: user.id,
      name: user.name,
      age: user.age,
      description: user.description
    };
  } catch (error) {
    console.error(error);
    await sequelize.close();

    return null;
  }
}

async function updateUser(user) {
  const { sequelize, User } = await connectToDB();

  try {
    const result = await User.update({
      name: user.name,
      age: user.age,
      description: user.description
    }, {
      where: { id: user.id },
      returning: true
    });

    await sequelize.close();

    if (result[0] === 0 || result[1].length !== 1) {
      return null;
    }

    return {
      id: result[1][0].id,
      name: result[1][0].name,
      age: result[1][0].age,
      description: result[1][0].description
    };
  } catch (error) {
    console.error(error);
    await sequelize.close();

    return null;
  }
}

async function deleteUser(id) {
  const { sequelize, User } = await connectToDB();

  try {
    const user = await User.findByPk(id);
    if (user === null) {
      await sequelize.close();
      return null;
    }

    await user.destroy();
    await sequelize.close();

    return {
      id: user.id,
      name: user.name,
      age: user.age,
      description: user.description
    };
  } catch (error) {
    console.error(error);
    await sequelize.close();

    return null;
  }
}

async function getAllUsersName() {
  const { sequelize, User } = await connectToDB();
  const users = await User.findAll({
    attributes: ['name']
  });
  await sequelize.close();

  return users.map(user => ({ name: user.name }));
}


module.exports = {
  getAllUsers,
  getUser,
  addUser,
  updateUser,
  deleteUser,
  getAllUsersName
};
